FROM php:8.3-fpm-alpine

# Install system packages
RUN apk add --no-cache \
    git curl libpng-dev libxml2-dev zip unzip nodejs npm oniguruma-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
COPY . .

# === CRITICAL FIXES ===
RUN cp .env.example .env || true          # ← This line was missing
RUN mkdir -p database && \
    touch database/database.sqlite && \
    chmod 666 database/database.sqlite && \
    chown -R www-data:www-data database storage bootstrap/cache

# Install dependencies + run migrations (now safe)
RUN composer install --optimize-autoloader --no-dev --no-interaction --no-scripts && \
    php artisan key:generate --force && \
    php artisan module:migrate YipEcommerce --force && \
    php artisan module:seed YipEcommerce --force && \
    php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache

RUN npm ci && npm run build

# Final permissions
RUN chown -R www-data:www-data storage bootstrap/cache database

EXPOSE 8080
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]