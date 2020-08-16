FROM php:7.4-fpm-alpine

ARG PSYSH_DIR=/usr/local/share/psysh
ARG PHP_MANUAL_URL=http://psysh.org/manual/ja/php_manual.sqlite

ARG TZ

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer

RUN set -eux && \
  apk update && \
  apk add --update --no-cache --virtual=.build-dependencies \
    autoconf \
    gcc \
    g++ \
    make \
    tzdata && \
  apk add --update --no-cache \
    icu-dev \
    oniguruma-dev \
    libzip-dev && \
  cp /usr/share/zoneinfo/Asia/Tokyo /etc/localtime && \
  echo ${TZ} > /etc/timezone && \
  pecl install xdebug && \
  apk del .build-dependencies && \
  docker-php-ext-install intl pdo_mysql mbstring zip bcmath && \
  docker-php-ext-enable xdebug && \
  mkdir $PSYSH_DIR && wget $PHP_MANUAL_URL -P $PSYSH_DIR && \
  curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer && \
  composer config -g repos.packagist composer https://packagist.jp && \
  composer global require hirak/prestissimo

RUN apk add --no-cache freetype libpng libjpeg-turbo freetype-dev libpng-dev libjpeg-turbo-dev && \
  docker-php-ext-configure gd \
    --with-jpeg=/usr/include/ \
    --with-freetype=/usr/include/ && \
  NPROC=$(grep -c ^processor /proc/cpuinfo 2>/dev/null || 1) && \
  docker-php-ext-install -j${NPROC} gd && \
  apk del --no-cache freetype-dev libpng-dev libjpeg-turbo-dev

ADD . /work/app

WORKDIR /work/app

RUN chmod -R 777 /var/www/storage \
        /var/www/bootstrap/cache

RUN php artisan key:generate
RUN php artisan config:clear
RUN php artisan config:cache
RUN php artisan optimize
