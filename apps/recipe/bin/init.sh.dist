#!/bin/bash

# wait until database is ready
./bin/wait-for-it.sh -h database -p 3306

# drop database first, so we re-run this script again and again and again ...
./bin/console doctrine:database:drop --force -q --no-interaction

# create database
./bin/console doctrine:database:create --no-interaction

# ... and schema
./bin/console doctrine:schema:create --no-interaction

# load fixtures
./bin/console hautelook:fixtures:load --no-interaction

# HF!
echo ">> Application initialization done! HF!"
