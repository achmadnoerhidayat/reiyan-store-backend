FROM php:8.3-fpm as builder

RUN apt-get update && apt-get install -y git unzip zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY composer.json composer.lock ./

RUN composer install --no-dev --no-scripts --no-autoloader --prefer-dist

FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    git unzip curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip libzip-dev \
    libmagickwand-dev --no-install-recommends \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . /var/www

COPY --from=builder /var/www/vendor /var/www/vendor

RUN composer dump-autoload --optimize

COPY entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
CMD ["php-fpm"]
