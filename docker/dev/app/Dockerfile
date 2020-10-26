FROM php:7.4-fpm-alpine

ARG FRONT_HOST
ARG NAME
ENV NAME=${NAME}
RUN apk update && apk add curl wget gettext

###################
#      Nginx      #
###################

# Install Nginx
RUN apk update && \
  apk add nginx && \
  adduser -D -g 'www' www && \
  mkdir -p /www/${NAME} && \
  chown -R www:www /var/lib/nginx && \
  chown -R www:www /www

# Copy nginx config

COPY ./config-nginx/nginx.conf /tmp/nginx/nginx.conf

# Change ENV by value
RUN envsubst '\${FRONT_HOST} \${NAME}' < /tmp/nginx/nginx.conf > /etc/nginx/nginx.conf



###################
#       PHP       #
###################

# copy php config
COPY ./config-php/php.ini /usr/local/etc/php/php.ini
COPY ./config-php/php_fpm.conf /etc/php7/php_fpm.conf
COPY ./config-php/php-fpm.d /etc/php7/php-fpm.d



# Install PHP extentions
RUN docker-php-source extract \
    && apk add --no-cache --virtual .phpize-deps $PHPIZE_DEPS zlib-dev libzip-dev libpng-dev icu-dev openssl-dev zip \
    && docker-php-ext-install -j$(nproc) mysqli \
    && docker-php-ext-install -j$(nproc) pdo_mysql \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install -j$(nproc) iconv \
    && docker-php-ext-install -j$(nproc) intl \
    && docker-php-ext-install -j$(nproc) opcache \
    && docker-php-ext-install -j$(nproc) zip \
    && pecl install apcu \
    && docker-php-ext-enable apcu \
    && docker-php-source delete

RUN echo $' \n\
extension=apcu.so \n\
apc.enable=1 \n\
apc.enable_cli=1' > /usr/local/etc/php/conf.d/docker-php-ext-apcu.ini

# Set timezone
RUN ln -s /usr/share/zoneinfo/Europe/Paris /etc/localtime

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
# library for use composer in multithread
#RUN composer global require hirak/prestissimo

COPY ./laravel.ini /usr/local/etc/php/conf.d/laravel.ini



###################
# Launch Services #
###################

CMD \
  mkdir -p /var/log/nginx/${NAME}/ && \
  chmod -R 0777 /var/log/nginx/${NAME}/ && \
  mkdir -p /var/tmp/nginx/ && \
  chmod -R 0777 /var/tmp/nginx/ && \
  /usr/sbin/nginx && \
  php-fpm -R --nodaemonize

WORKDIR /www/${NAME}
