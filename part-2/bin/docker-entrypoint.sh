#!/usr/bin/env sh

set -e

# Install composer dependencies if composer.json exists
if [ -f "composer.json" ]; then
    echo "Installing Composer dependencies..."
    composer install --no-interaction
fi

# Start the PHP built-in web server
php -S 0.0.0.0:$HTTP_PORT
