#!/bin/sh
set -e

echo "Deploying application ..."

# Enter maintenance mode
(php artisan down --message 'The app is being (quickly!) updated. Please try again in a minute.') || true

    git fetch origin master
    git reset --hard origin/master

    composer install --no-interaction --prefer-dist --optimize-autoloader

    php artisan migrate --force

    php artisan queue:restart

    php artisan optimize

    echo "" | sudo systemctl restart php7.3-fpm

# Exit maintenance mode
php artisan up

echo "Application deployed!"
