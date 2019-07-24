# nginx
FROM nginx:alpine as builder
ARG LARAVEL_PATH=/app/laravel
COPY readme.md ${LARAVEL_PATH}/readme.md
COPY nginx/laravel.conf /etc/nginx/conf.d/laravel.conf


# php-fpm
FROM php:7.2-fpm-alpine as laravel
ARG LARAVEL_PATH=/app/laravel
COPY --from=builder ${LARAVEL_PATH}/readme.md ${LARAVEL_PATH}/readme.md
COPY laravel/ ${LARAVEL_PATH}/


#!/usr/bin/env bash
# docker build -t my/nginx --target=builder .
# docker build -t my/laravel --target=laravel .

# docker network create lnmp
# docker run -it --rm -d --name=laravel --network=lnmp my/laravel
# docker run -it --rm -d --network=lnmp -p 8080:80 my/nginx