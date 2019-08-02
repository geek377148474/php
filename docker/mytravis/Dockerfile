# docker build -t myphp ./Dockerfile

# PHP版本
ARG PHP_VERSION

# FROM必须在后面这些ARG前面 因为每个FROM都是分割线 保证不影响下个FROM镜像的ARG
FROM php:${PHP_VERSION}-fpm-alpine

# 安装PHP基础扩展
ARG PHP_EXTENSIONS

# php alpine镜像源
ARG ALPINE_REPOSITORIES

# php swoole版本
ARG SWOOLE_VERSION

# 更多的扩展
ARG MORE_EXTENSION_INSTALLER

ENV EXTENSIONS=",${PHP_EXTENSIONS},"
ENV MC="-j$(nproc)"

COPY  extensions /tmp/extensions
WORKDIR /tmp/extensions
RUN export MC="-j$(nproc)" \
    && chmod +x install.sh \
    && sh install.sh \
    && chmod +x "${MORE_EXTENSION_INSTALLER}" \
    && sh "${MORE_EXTENSION_INSTALLER}" \
    && rm -rf /tmp/extensions
