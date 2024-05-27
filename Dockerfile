FROM php:8.1-fpm
RUN apt-get update -y && apt-get install -y libmcrypt-dev openssl git curl libpng-dev libonig-dev libxml2-dev libzip-dev zip unzip supervisor
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
WORKDIR /app
COPY code /app
ADD docker/supervisor.conf /etc/supervisor/conf.d/worker.conf
RUN composer install --no-dev --optimize-autoloader
RUN php artisan key:gen
RUN php artisan config:clear
RUN php artisan view:clear
CMD php artisan serve --host=0.0.0.0 --port=8000
EXPOSE 8000
