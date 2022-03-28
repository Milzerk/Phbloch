FROM php:8.1-fpm-alpine

RUN apk update

COPY --from=composer:2.3 /usr/bin/composer /usr/bin/composer