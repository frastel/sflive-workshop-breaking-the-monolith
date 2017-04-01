#!/bin/bash

cmd=${1:-install}
app=${2:-monolith}

shift
shift

what=$@

docker run --rm -ti \
    --volume $(pwd)/apps/${app}:/app \
    --volume $(pwd)/.composer:/composer \
    composer:1.3 $cmd $what
