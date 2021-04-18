FROM php:8.0-fpm-alpine

WORKDIR /var/www/html

COPY *.php .
