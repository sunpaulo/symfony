#!/bin/bash

DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" > /dev/null 2>&1 && pwd )"
docker-compose -p $PROJECT_NAME -f $DIR/docker-compose.yml -f $DIR/docker-compose.dev.yml $@