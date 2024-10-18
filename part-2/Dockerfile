FROM php:8.3.12-alpine

RUN ( curl -sSLf https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions -o - || echo 'return 1' ) | sh -s \
    curl \
    gd \
    intl \
    mbstring \
    mysqlnd \
    zip

COPY ./src /var/www/html

WORKDIR /var/www/html

ENV PHP_ENV=development

ENV HTTP_PORT=80
EXPOSE ${HTTP_PORT}

ENTRYPOINT php -S "0.0.0.0:${HTTP_PORT}"
