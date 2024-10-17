FROM php:8.3.12-alpine

RUN ( curl -sSLf https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions -o - || echo 'return 1' ) | sh -s \
    curl \
    gd \
    intl \
    mbstring \
    mysqlnd \
    zip

CMD ["php", "-m"]
