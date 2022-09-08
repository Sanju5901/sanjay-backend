FROM php:8.1-fpm-alpine

COPY --from=composer /usr/bin/composer /usr/bin/composer
RUN docker-php-ext-install pdo pdo_mysql

WORKDIR /sanjay

COPY . .
RUN composer install

WORKDIR public
CMD ["php", "-S", "0.0.0.0:8000"]
