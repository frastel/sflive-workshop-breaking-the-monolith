#!/bin/bash

env=${1:-dev}

# wait until database is ready
./bin/wait-for-it.sh -h database -p 3306

# drop database first, so we re-run this script again and again and again ...
./bin/console doctrine:database:drop --force -q --no-interaction --env=${env}

# create database
./bin/console doctrine:database:create --no-interaction --env=${env}

# ... and schema
./bin/console doctrine:schema:create --no-interaction --env=${env}

# load fixtures
./bin/console hautelook:fixtures:load --no-interaction --env=${env}

# HF!
echo ">> Application initialization done! HF!"
