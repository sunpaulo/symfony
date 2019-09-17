FROM php:7.2-fpm

RUN apt-get update && docker-php-ext-install pdo pdo_mysql bcmath

RUN pecl install xdebug
RUN docker-php-ext-enable xdebug
ADD ./xdebug.ini /var/
RUN cat /var/xdebug.ini >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

ADD ./expandmemoryphp.ini /var/
RUN cat /var/expandmemoryphp.ini >> /usr/local/etc/php/conf.d/docker-php-expand-memory-php.ini

RUN mkdir /var/www/.config; chown www-data:www-data /var/www/.config

CMD php-fpm