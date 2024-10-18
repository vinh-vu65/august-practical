FROM php:8.3.12-alpine

RUN ( curl -sSLf https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions -o - || echo 'return 1' ) | sh -s \
    curl \
    gd \
    intl \
    mbstring \
    mysqlnd \
    zip

COPY --from=composer/composer:2.8.1-bin /composer /usr/bin/composer
COPY ./docker-entrypoint.sh /usr/local/bin/docker-entrypoint

COPY ./src /var/www/html

WORKDIR /var/www/html

ENV PHP_ENV=development

ENV HTTP_PORT=80
EXPOSE ${HTTP_PORT}

ENTRYPOINT ["docker-entrypoint"]
