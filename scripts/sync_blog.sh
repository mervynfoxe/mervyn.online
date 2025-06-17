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
LOCAL_DIR="storage/blog"
# Move to project root
cd "${DIR}/.."

# Get env vars for S3 config
source .env

if [[ ! "$(which s3cmd)" ]]; then
    echo "s3cmd not found in path. Unable to sync."
    quit
fi

if [[ -z ${DO_BUCKET} || -z ${DO_FOLDER} ]]; then
    echo "One or more environment variables required for deployment are not set."
    echo "Please make sure to set all of the following variables in the app's .env file to valid values before syncing."
    echo "\$DO_BUCKET - The name of the S3 bucket to use"
    echo "\$DO_FOLDER - The directory within the named bucket to sync content to"
    quit
fi

echo "Ready to sync content from ${LOCAL_DIR}/* to s3://${DO_BUCKET}/${DO_FOLDER}"
echo "Permissions will be set to PRIVATE for content and PUBLIC for images."
echo "Files no longer in the local directory tree will be DELETED."
confirm "Is this okay?" || quit 0 "Exiting..."

echo "Syncing blog content to S3..."
s3cmd sync ${LOCAL_DIR}/*.md ${LOCAL_DIR}/content "s3://${DO_BUCKET}/${DO_FOLDER}/" --recursive --delete-removed --exclude '.DS_Store'
echo -e "\nSyncing blog images to S3..."
s3cmd sync ${LOCAL_DIR}/images "s3://${DO_BUCKET}/${DO_FOLDER}/" --recursive --acl-public --delete-removed --exclude '.DS_Store'
s3cmd_status=$?

[ $s3cmd_status -eq 0 ] || echo "A problem was encountered during content sync. Please check the logs and try again."
