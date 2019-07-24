# nginx
FROM nginx:alpine as builder
# ARG LARAVEL_PATH=/app/laravel
# COPY readme.md ${LARAVEL_PATH}/readme.md
# COPY laravel.conf /etc/nginx/conf.d/laravel.conf
RUN echo 'hello, docker-compose' > /usr/share/nginx/html/index.html;
EXPOSE 80