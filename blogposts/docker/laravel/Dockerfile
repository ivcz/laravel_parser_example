FROM php:8.1-apache

WORKDIR /var/www/html

ARG WWWGROUP

RUN usermod --uid $WWWGROUP www-data

RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libpng-dev \
    libwebp-dev \
    libjpeg62-turbo-dev \
    libcurl4 \
    libcurl4-openssl-dev \
    libzip-dev \
    libmcrypt-dev \
    libpq-dev

RUN docker-php-ext-install zip \
    curl \
    gd \
    pdo \
    pdo_pgsql \
    pgsql

RUN a2enmod rewrite

COPY 000-default.conf /etc/apache2/sites-available/000-default.conf
