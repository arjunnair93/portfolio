FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Configure PHP
RUN cp "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create app directory
WORKDIR /var/www/html

# Create non-root user
RUN groupadd -g 1000 www && \
    useradd -u 1000 -ms /bin/bash -g www www

# Copy composer files first to leverage Docker cache for dependencies
COPY --chown=www:www composer.json composer.lock ./

# Install PHP dependencies without dev packages and skip scripts
RUN composer install --no-interaction --optimize-autoloader --no-dev --no-scripts

# Copy the rest of the application
COPY --chown=www:www . .

# Now run the composer scripts after copying the application
RUN composer dump-autoload --optimize

# Create storage and cache directories
RUN mkdir -p storage/logs storage/framework/cache storage/framework/sessions storage/framework/views \
    && chmod -R 775 storage bootstrap/cache

# Run Laravel optimizations and discovery (only if not in development)
RUN if [ "$APP_ENV" != "local" ]; then \
        php artisan package:discover --ansi && \
        php artisan config:cache && \
        php artisan route:cache && \
        php artisan view:cache; \
    fi

# Change ownership to www-data user for permissions
RUN chown -R www:www /var/www/html

# Switch to non-root user
USER www

# Expose PHP-FPM port
EXPOSE 9000

# Start PHP-FPM
CMD ["php-fpm"]