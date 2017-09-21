FROM php:5-apache
     
# PHP extensions
RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng12-dev \
   && pecl install xdebug \
   && docker-php-ext-install -j$(nproc) mbstring pdo_mysql tokenizer mcrypt iconv mysqli \
   && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
   && docker-php-ext-install -j$(nproc) gd \
   && docker-php-ext-enable xdebug
     
# Apache modules
RUN a2enmod rewrite
