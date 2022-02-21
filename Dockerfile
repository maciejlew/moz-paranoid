FROM composer:2 as composer
FROM php:7.1-cli-alpine

COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /app/
