FROM php:7.4-alpine

ENV COMPOSER_ALLOW_SUPERUSER=1 \ 
    COMPOSER_NO_INTERACTION=1 \
    COMPOSER_HOME=/opt/composer

COPY --from=composer:2.0 /usr/bin/composer /usr/bin/composer

RUN apk add --no-cache libpq-dev

RUN docker-php-ext-install bcmath pdo_pgsql

COPY ./php.ini /user/local/etc/php/php.ini

EXPOSE 8000

WORKDIR /var/www

CMD ["tail", "-f", "/dev/null"]
