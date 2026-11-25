#!/bin/sh
set -e

[ -d vendor ] || composer install
[ -d node_modules ] || npm install
[ -f .env ] || cp .env.example .env
grep -q '^APP_KEY=base64:' .env || php artisan key:generate

if [ ! -f database/database.sqlite ]; then
    touch database/database.sqlite
    php artisan migrate
fi

exec "$@"
