FROM php:8.3-fpm-alpine

# Install system dependencies + Node.js + npm
RUN apk add --no-cache \
    git \
    curl \
    libpng-dev \
    libxml2-dev \
    zip \
    unzip \
    nginx \
    nodejs \
    npm \
    oniguruma-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Install PHP dependencies
RUN composer install --optimize-autoloader --no-dev --no-interaction

# Install Node dependencies and build assets
RUN npm install && npm run build

# Nginx configuration
COPY .docker/nginx.conf /etc/nginx/http.d/default.conf

# Permissions
RUN chown -R www-data:www-data storage bootstrap/cache

# Expose port
EXPOSE 8080

# Start Nginx + PHP-FPM
CMD ["sh", "-c", "php-fpm & nginx -g 'daemon off;'"]