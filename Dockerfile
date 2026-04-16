FROM php:8.3-fpm-alpine

# Install system dependencies + oniguruma for mbstring
RUN apk add --no-cache \
    git \
    curl \
    libpng-dev \
    libxml2-dev \
    zip \
    unzip \
    nodejs \
    npm \
    oniguruma-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

# Create SQLite database directory and file (important for Render)
RUN mkdir -p database && \
    touch database/database.sqlite && \
    chmod 666 database/database.sqlite && \
    chown -R www-data:www-data database storage bootstrap/cache

# Install dependencies
RUN composer install --optimize-autoloader --no-dev --no-interaction
RUN npm ci && npm run build

# Permissions again (just to be sure)
RUN chown -R www-data:www-data storage bootstrap/cache database

EXPOSE 8080

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]