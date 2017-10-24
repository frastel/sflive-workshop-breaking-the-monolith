#!/bin/bash
docker rm -f workshop-database-test 2> /dev/null

docker-compose --file dev.yml run --rm phpunit bin/phpunit "$@"
