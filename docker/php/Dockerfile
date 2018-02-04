FROM php:7-fpm

ENV DEBIAN_FRONTEND noninteractive

# Install iconv mcrypt opcache intl zip gd
RUN apt-get update && apt-get install -y curl unzip \
        libfreetype6-dev libpng-dev libjpeg62-turbo-dev \
        libmcrypt-dev \
        libicu-dev \
        libxml2-dev libssl-dev gnupg \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/
RUN docker-php-ext-install bcmath iconv intl mbstring opcache pdo_mysql zip gd soap

# Configurations
ADD php.ini /usr/local/etc/php/php.ini
ADD fpm.ini /usr/local/etc/php-fpm.d/www.conf

#SSH
ADD ssh /root/.ssh/
RUN chmod 400 /root/.ssh/id_rsa
RUN echo Europe/Paris | tee /etc/timezone &&  dpkg-reconfigure --frontend noninteractive tzdata


WORKDIR /www

CMD ["php-fpm"]
