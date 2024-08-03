FROM php:8.3-fpm

#Install the dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libfreetype6-dev \
    zip \
    locales \
    vim \
    unzip \
    git \
    curl \
    libonig-dev

#Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

#Install composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

#Work directory
WORKDIR /var/www

COPY . . 

#Permissions
RUN chown -R www-data:www-data /var/www
RUN chmod -R 755 /var/www/storage

RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
RUN chmod -R 775 /var/www/storage /var/www/bootstrap/cache

#Expose door
EXPOSE 9000

#Start command
CMD ["php-fpm"]
