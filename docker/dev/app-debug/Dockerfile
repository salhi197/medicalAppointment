ARG NAME
FROM ${NAME}_app-dev:latest
ENV NAME=${NAME}
ARG FRONT_HOST

###################
#      Nginx      #
###################

# Copy nginx config
COPY ./config-nginx/nginx.conf /tmp/nginx/nginx.conf
RUN envsubst '\${FRONT_HOST} \${NAME}' < /tmp/nginx/nginx.conf > /etc/nginx/nginx.conf

###################
#       PHP       #
###################

# Install PHP extentions for dev
RUN docker-php-source extract \
    && pecl install xdebug \
    && docker-php-source delete

COPY ./config-php/conf.d/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

