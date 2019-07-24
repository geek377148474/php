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



#==========================
# 如果想用外部访问容器

# 本地/etc/nginx/conf.d/www.charlie.com.conf
# server {
#     listen 80; 
#     server_name www.charlie.com;
#     root /data/www/blog;
#     index index.php index.html;
#     access_log  /data/log/nginx/www.charlie.com.access.log  main;
#     error_log  /data/log/nginx/www.charlie.com.error.log;

#     location / { 
#         try_files $uri $uri/ /index.php?$args;
#     }   

#     location ~ \.php$ {
#         fastcgi_pass 127.0.0.1:9002;                                                                                      
#     }   
# }

# -p 9002:9000  访问当前9002接口=访问该容器9000接口
# -v /data/www/blog:/data/www/blog  容器中访问/data/www/blog=访问当前/data/www/blog

# docker run -it --rm -d --name=laravel -p 9002:9000 -v /data/www/blog:/data/www/blog --network=lnmp my/laravel