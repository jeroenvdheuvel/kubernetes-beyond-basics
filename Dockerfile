FROM php:8.0-alpine as generator

WORKDIR /var/www/html

COPY *.php .

CMD php pi-html-generator.php
