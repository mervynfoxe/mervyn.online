#!/bin/bash

# THIS FILE SHOULD NOT BE CALLED DIRECTLY
# It is versioned for reference purposes, and is meant to be manually pushed to the webserver
# to handle setting file permissions as needed/via cron.

DIR=$( cd -- "$( dirname -- "${BASH_SOURCE[0]}" )" &> /dev/null && pwd )
cd "$DIR"
cd "$1"

# Find incorrectly-set groups in site files and set them properly
find . ! -group git ! -group www-data -exec chgrp www-data {} +
# Set ownership of incorrectly-set files
find . ! -user git ! -user www-data ! -user `whoami` -exec chown `whoami` {} +
# Allow group-write for database/view files that may be owned by a deploying user
chmod g+w prezet.sqlite
chmod g+w database/database.sqlite
find storage/framework/views -user `whoami` -exec chmod g+w {} +
chmod -R g+w storage/logs/*

cd "$DIR"
echo "Last run on $(date +'%d-%m-%y') at $(date +'%T')" > "incron.${1}.log"
