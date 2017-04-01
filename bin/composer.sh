#!/bin/bash

cmd=${1:-install}

shift

what=$@

docker run --rm -ti \
    --volume $(pwd)/apps/monolith:/app \
    --volume $(pwd)/.composer:/composer \
    composer:1.3 $cmd $what
