#!/bin/bash

# Get and return user confirmation
confirm() {
    read -r -p "${1:-Are you sure?} [y/N] " response
    case "$response" in
        [yY][eE][sS]|[yY])
            true
            ;;
        *)
            false
            ;;
    esac
}

# Exit with an optional message and exit code
quit() {
    code=${1:-1}
    if [[ -n "$2" ]]; then
        echo "$2"
    fi
    exit "$code"
}

DIR=$( cd -- "$( dirname -- "${BASH_SOURCE[0]}" )" &> /dev/null && pwd )
ORIG_BRANCH="$(git rev-parse --abbrev-ref HEAD)"
DID_STASH=0
DEPLOY_CONTENT=${DEPLOY_CONTENT:-0}

# Check if we are running this script from within the lando container
# (e.g. via `lando deploy-prod` or after entering `lando ssh`)
# or from the host machine.
if [ "$(which lando)" ]; then
  LANDO='lando'
  IN_CONTAINER=0
else
  LANDO=''
  IN_CONTAINER=1
fi

if [[ -z ${TARGET_HOST} || -z ${TARGET_USER} || -z ${TARGET_DIR} || -z ${BRANCH} ]]; then
    echo "One or more environment variables required for deployment are not set."
    echo "Please make sure to set all of the following variables to valid values before deploying."
    echo "\$TARGET_HOST - The deployment destination server"
    echo "\$TARGET_USER - The remote user to connect/deploy as"
    echo "\$TARGET_DIR - The remote directory to deploy to"
    echo "\$BRANCH - The local git branch to check out before deploying (unstaged changes will be stashed)"
    quit
fi

echo "Preparing site files for deployment..."

# Make sure we're in the right directory for calling the script from the host machine or container
# and set the source directory accordingly
if [[ $IN_CONTAINER -ne 1 ]]; then
    cd "$DIR/.." || quit "Unable to locate app directory."
    deploy_from="."
else
    deploy_from="${LANDO_MOUNT}/"
fi

if [[ $FROM_LANDO -ne 1 ]]; then
  if [[ $IN_CONTAINER -eq 1 ]]; then
    # We can't access the node service from here,
    # direct the user towards next steps
    echo "Script called from within Lando container, node is unavailable."
    echo "If you have not built site assets, please do so from the host machine via 'lando npm run build' or 'lando build' before continuing."
    if [ "$1" != "-y" ]; then
        read -rp "Press enter to continue"
    fi
  else
    echo "Building site packages..."
    $LANDO npm run build
  fi
fi

echo "Will deploy the branch '${BRANCH}' to the following location:"
echo "${TARGET_USER}@${TARGET_HOST}:${TARGET_DIR}"
if [ "$1" != "-y" ]; then
    confirm "Is this okay?" || quit 0 "Exiting..."
fi

if [ "$(git status --porcelain 2>/dev/null | wc -l)" -ne 0 ]; then
    echo "Stashing changes before switching branches..."
    git stash push -u -m "Stashed changes before automated deployment"
    DID_STASH=1
fi

echo "Checking out ${BRANCH}..."
git checkout --quiet "${BRANCH}"

echo "Updating databases..."
touch "${deploy_from}/database/database.sqlite"
touch "${deploy_from}/prezet.sqlite"
php artisan migrate
php artisan prezet:index

echo "Setting file permissions for server..."
echo -e "\tApp database"
chmod g+w "${deploy_from}/database/database.sqlite"
echo -e "\tBlog database"
chmod g+w "${deploy_from}/prezet.sqlite"
echo -e "\tFramework directories"
chmod -R g+w "${deploy_from}/storage/framework"

echo "Syncing site files..."
if [[ $DEPLOY_CONTENT -eq 1 ]]; then
    echo "Including blog storage."
    rsync_exclude=""
else
    echo "Excluding blog storage. Please sync content separately."
    rsync_exclude="storage/blog"
fi
rsync -alvz --delete --exclude-from="${DIR}/.deployignore" --exclude="${rsync_exclude}" "${deploy_from}" "${TARGET_USER}@${TARGET_HOST}:${TARGET_DIR}/"
rsync_status=$?

[ $rsync_status -eq 0 ] || echo "A problem was encountered during deployment. Please check the logs and try again."

git checkout --quiet "${ORIG_BRANCH}"

if [ $DID_STASH -eq 1 ]; then
    echo "Restoring stashed changes to ${ORIG_BRANCH}..."
    git stash apply
    stash_status=$?
    if [ $stash_status -eq 0 ]; then
      echo "Changes restored, stash left on stack."
    else
      echo "Error restoring stashed changes. Stash left on stack."
    fi
fi

[ $rsync_status -eq 0 ] && echo "Deploy complete!"

if [[ ! $DEPLOY_CONTENT -eq 1 ]]; then
    echo "Blog content and images were NOT synced. Please run the sync_blog.sh script to publish content."
fi
