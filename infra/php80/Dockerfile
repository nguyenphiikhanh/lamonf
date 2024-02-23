FROM php:8.0-fpm

# Install PHP package
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    && pecl install mongodb \
    && docker-php-ext-enable mongodb \
    && docker-php-ext-install pdo_mysql gd zip

# Composer Installation
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Working dir
WORKDIR /var/www/html

COPY . .
COPY ./infra/nginx/sites-available/nginx.conf /etc/nginx/sites-available/lamonf.conf

# Install Laravel dependencies
RUN composer install --optimize-autoloader --no-dev

# change permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expose & run PHP-FPM
EXPOSE 9000
CMD ["php-fpm"]
