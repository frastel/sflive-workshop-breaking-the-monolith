#!/bin/bash

what=${1:-workshop-monolith}

# get the exact name
id=`docker ps | docker ps -f name=$what -q`

if [ -z "$id" ]; then
    echo ">> ERROR: No running docker instance found with name '${what}'"
    exit 1
fi

docker exec -ti $what bash
