FROM php:8.0.8-cli

RUN pecl install xdebug \
    && echo "zend_extension=xdebug" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/xdebug.ini

#RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install sockets

RUN apt-get update && apt-get install -y \
    zip \
    unzip

COPY --from=composer /usr/bin/composer /usr/bin/composer