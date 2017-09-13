#!/bin/bash

envsubst  '${NGINX_HOST},${NGINX_ALIAS}' < nginx/symfony.conf > nginx/symfony.conf_true