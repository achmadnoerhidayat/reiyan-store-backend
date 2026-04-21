#!/bin/bash
set -e

if [ "$APP_ENV" = "production" ]; then
    echo "--- MODE PRODUKSI: Menjalankan optimasi Laravel... ---"
    php artisan config:cache
    php artisan route:cache
    php artisan view:cache
    php artisan migrate --force
else
    if [ ! -f "composer.json" ]; then
        echo "--- FOLDER PROYEK KOSONG: Sedang menginstall Laravel... ---"
        composer create-project laravel/laravel temp_laravel --prefer-dist --no-progress
        cp -rn temp_laravel/. .
        rm -rf temp_laravel
    else
        echo "--- PROYEK DITEMUKAN: Menyiapkan dependensi... ---"
        if [ ! -d "vendor" ]; then
            composer install --no-interaction --optimize-autoloader
        fi
    fi
fi

# Atur permission (Wajib di kedua environment)
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

echo "--- READY: Menjalankan command utama ($@) ---"
exec "$@"
