#!/bin/bash

echo "xdebug.remote_host=${DOCKER_IP}" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

cd /var/www/symfony
chown -R www-data: /var/www/symfony

echo '-- COMPOSER INSTALL --'
su -c www-data -c 'composer install --optimize-autoloader'
su -c www-data -c 'composer dump-autoload'

echo '-- CLEAR CACHE --'
php bin/console cache:clear --env=$SYMFONY_ENV --no-debug --no-warmup
php bin/console doctrine:migrations:migrate
su -c www-data -c 'chmod -R 0777 var'

echo '-- RUN FPM --'
php-fpm