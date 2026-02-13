#!/bin/bash
set -e

if [ ! -f "composer.json" ]; then
    echo "--- FOLDER PROYEK: Sedang menginstall Laravel... ---"

    export COMPOSER_PROCESS_TIMEOUT=3600
    # 1. Install ke folder sementara 'temp_laravel'
    composer create-project laravel/laravel temp_laravel --prefer-dist --no-progress

    # 2. Pindahkan isinya ke folder utama (termasuk file hidden seperti .env)
    cp -rn temp_laravel/. .

    # 3. Hapus folder sementara
    rm -rf temp_laravel

    # 4. Atur permission
    chown -R www-data:www-data storage bootstrap/cache
    chmod -R 775 storage bootstrap/cache

    echo "--- SELESAI: Laravel sudah berhasil dipasang! ---"
else
    echo "--- PROYEK DITEMUKAN: Jalankan composer install... ---"
    composer install --no-interaction --optimize-autoloader
fi

exec "$@"
