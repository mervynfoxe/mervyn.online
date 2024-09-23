#!/bin/bash

# THIS FILE SHOULD NOT BE CALLED DIRECTLY
# It is versioned for reference purposes, and is meant to be manually pushed to the webserver
# to handle setting file permissions as needed.

DIR=$( cd -- "$( dirname -- "${BASH_SOURCE[0]}" )" &> /dev/null && pwd )
cd "$DIR"
cd "$1"

chgrp -R www-data .
chmod g+w prezet.sqlite
chmod g+w database/database.sqlite
chmod -R g+w storage/framework/*
chmod -R g+w storage/logs/*

cd "$DIR"
echo "Last run on $(date +'%d-%m-%y') at $(date +'%T')" > "incron.${1}.log"
