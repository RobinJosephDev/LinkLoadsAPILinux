FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www

# Install dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpq-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    && docker-php-ext-install pdo pdo_pgsql mbstring zip exif pcntl bcmath

# Install Composer
COPY --from=composer:2.5 /usr/bin/composer /usr/bin/composer

# Copy project files
COPY . .

# Laravel setup
RUN cp .env.example .env \
    && composer install --no-dev --optimize-autoloader --no-scripts \
    && php artisan key:generate --force \
    && php artisan config:clear \
    && php artisan route:clear \
    && php artisan view:clear \
    && chown -R www-data:www-data /var/www

# Expose port
EXPOSE 8080

RUN ln -sf /dev/stdout /var/www/storage/logs/laravel.log

# Run Laravel's built-in server
CMD php artisan serve --host=0.0.0.0 --port=8080
