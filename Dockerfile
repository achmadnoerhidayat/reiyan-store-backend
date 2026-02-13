FROM php:8.3-fpm

# Install dependencies sistem
RUN apt-get update && apt-get install -y \
    git unzip curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip libzip-dev \
    libmagickwand-dev --no-install-recommends \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Ambil Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Salin script sakti kita
COPY entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
CMD ["php-fpm"]
