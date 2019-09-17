#!/bin/bash

### Build the images needed
/var/www/app/docker/dev.sh build

### Init new symfony app if it's not initialized yet
if [[ ! -d "/var/www/app/code" ]]
then
    docker run --volume /var/www/app:/app composer:latest composer create-project symfony/website-skeleton code
fi

### Install composer dependencies
docker run --volume /var/www/app/code:/app composer:latest composer install --ignore-platform-reqs --no-plugins --no-scripts

### Start containers
/var/www/app/docker/dev.sh up -d

# /var/www/app/docker/dev.sh exec -T php

### Shut down containers
/var/www/app/docker/dev.sh down
sleep 30