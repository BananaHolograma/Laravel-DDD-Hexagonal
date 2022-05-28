#PHP BASE IMAGE FOR MULTI STAGING
FROM php:8.1-fpm-alpine3.16

ARG HOST_UID
ARG HOST_GID

ENV HOST_UID=${HOST_UID}
ENV HOST_GID=${HOST_GID}

COPY config/www.conf /usr/local/etc/php-fpm.d/www.conf
COPY cron/start.sh /usr/local/bin/start

RUN delgroup dialout
RUN addgroup -g ${HOST_GID} --system laravel
RUN adduser -G laravel --system -D -s /bin/sh -u ${HOST_UID} laravel

RUN sed -i "s/user = www-data/user = laravel/g" /usr/local/etc/php-fpm.d/www.conf
RUN sed -i "s/group = www-data/group = laravel/g" /usr/local/etc/php-fpm.d/www.conf
RUN echo "php_admin_flag[log_errors] = on" >> /usr/local/etc/php-fpm.d/www.conf

RUN mkdir -p /var/www/html && \
    chown laravel:laravel /var/www/html && \
    chmod u+x /usr/local/bin/start

WORKDIR /var/www/html

RUN apk add --update --no-cache --virtual .build-deps \
    autoconf \
    nodejs \
    npm \
    automake \
    g++ \
    bash \
    gcc \
    make \
    libzip-dev \
    postgresql-dev \
    postgresql-libs \
    sqlite-dev \
    mysql-client

RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql
RUN docker-php-ext-configure intl

RUN docker-php-ext-install bcmath opcache zip intl pdo pdo_mysql mysqli pdo_pgsql pdo_sqlite pcntl 
RUN docker-php-ext-enable opcache

RUN mkdir -p /usr/src/php/ext/redis \
    && curl -L https://github.com/phpredis/phpredis/archive/5.3.4.tar.gz | tar xvz -C /usr/src/php/ext/redis --strip 1 \
    && echo 'redis' >> /usr/src/php-available-exts \
    && docker-php-ext-install redis

COPY --from=composer:2.2.12 /usr/bin/composer /usr/local/bin/composer
