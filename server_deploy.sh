#!/bin/sh
set -e

echo "Deploying application ..."

# Enter maintenance mode
(php artisan down) || true

    git fetch origin master
    git reset --hard origin/master

    composer install --no-interaction --prefer-dist --optimize-autoloader

    php artisan migrate --force

    php artisan queue:restart

    php artisan optimize

    sudo chown -R www-data:www-data *

    echo "" | sudo systemctl restart php7.3-fpm

# Exit maintenance mode
php artisan up

echo "Application deployed!"
