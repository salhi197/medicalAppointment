ARG FRONT_HOST

#######################
# PHP with extentions #
#######################
FROM php:7.4-fpm-alpine as php74


### PHP
# copy php config
COPY ./docker/prod/app/config-php/php.ini /usr/local/etc/php/php.ini
COPY ./docker/prod/app/config-php/php_fpm.conf /etc/php7/php_fpm.conf
COPY ./docker/prod/app/config-php/php-fpm.d /etc/php7/php-fpm.d

# Install PHP extentions
RUN docker-php-source extract \
    && apk add --no-cache --virtual .phpize-deps $PHPIZE_DEPS \
    && apk add --no-cache mysql-dev zlib-dev libzip-dev libpng-dev icu-dev openssl-dev \
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

# Launch Services
CMD php-fpm -R --nodaemonize

WORKDIR /www/${NAME}

#############
# Build PHP #
#############
FROM php74 as composer
RUN mkdir /src
WORKDIR /src
COPY . /src
RUN apk update && apk add curl wget gettext
# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
# library for use composer in multithread
#RUN composer global require hirak/prestissimo

RUN SYMFONY_ENV=prod composer install -o --no-dev


##################################
# Final image with PHP and nginx #
##################################
FROM php74

ARG FRONT_HOST
ARG NAME
ENV NAME=${NAME}



### Nginx
# Install Nginx
RUN apk update && \
  apk add nginx gettext && \
  adduser -D -g 'www' www && \
  mkdir -p /www/${NAME} && \
  chown -R www:www /var/lib/nginx && \
  chown -R www:www /www/${NAME}

# Copy nginx config
COPY ./docker/prod/app/config-nginx/nginx.conf /tmp/nginx/nginx.conf

# Change ENV by value
RUN envsubst '\${FRONT_HOST} \${NAME}' < /tmp/nginx/nginx.conf > /etc/nginx/nginx.conf


WORKDIR /www/${NAME}

COPY --from=composer --chown=www:www /src/bin bin

COPY --from=composer --chown=www:www /src/app app
COPY --from=composer --chown=www:www /src/src src
COPY --from=composer --chown=www:www /src/web web
COPY --from=composer --chown=www:www /src/vendor vendor
COPY --from=composer --chown=www:www /src/var var

COPY --from=composer --chown=www:www /src/composer.json composer.json

RUN mkdir -p -m 0777 /www/${NAME}/var/cache/prod && \
    chown -R www:www /www/${NAME} && \
    chmod 0777 -R    /www/${NAME}/ && \
    mkdir -p -m 0777 /var/log/nginx/${NAME}/ && \
    mkdir -p -m 0777 /www/${NAME}/var/logs/ && \
    mkdir -p -m 0777 /var/tmp/nginx/

# Launch Services
CMD php bin/console cache:clear -e prod && \
    chmod 0777 -R var/cache && \
    php bin/console assetic:dump -e prod  && \
    /usr/sbin/nginx && \
    php-fpm -R --nodaemonize
