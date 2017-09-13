#!/bin/bash

# Stop docker
docker-compose stop

# Replace env variables
sh -ac ' . ./.env; ./scripts/replace_env.sh'

# Build and up docker
docker-compose up -d --build

# Do some cleans
unlink nginx/symfony.conf_true