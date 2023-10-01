FROM php:8.2-fpm

RUN apt-get update && \
    apt-get install -y \
    libzip-dev

RUN docker-php-ext-install zip

WORKDIR /var/www/html

COPY . /var/www/html

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

CMD ["php-fpm"]

EXPOSE 9000
