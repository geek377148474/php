#!/bin/sh

echo "============================================"
echo "Install extensions from   : install.sh"
echo "PHP version               : ${PHP_VERSION}"
echo "Multicore Compilation     : ${MC}" # 多核编译
echo "Work directory            : ${PWD}" # 当前工作目录
echo "============================================"
echo

echo "${SWOOLE_VERSION}"
echo "4.3 ${SWOOLE_VERSION##*swoole-4.3*}"
echo "4.4 ${SWOOLE_VERSION##*swoole-4.4*}"

echo "============================================="
echo "1. sedding repositotres"
echo "============================================="
echo
echo "alpine ${ALPINE_REPOSITORIES}";
if [ "${ALPINE_REPOSITORIES}" != "" ]; then
    echo "----- sedding ALPINE_REPOSITORIES -----";
    sed -i "s/dl-cdn.alpinelinux.org/${ALPINE_REPOSITORIES}/g" /etc/apk/repositories
fi

echo 
echo "============================================="
echo "2. Install dependencies"
echo "============================================="
if [ "${PHP_EXTENSIONS}" != "" ]; then
    echo "---------- Install general dependencies ----------"
    apk add --no-cache autoconf g++ libtool make curl-dev libxml2-dev linux-headers
fi

echo 
echo "============================================="
echo "3. Install extenxion start"
echo "============================================="
echo "installing: ${PHP_EXTENSIONS}"

if [ -z "${PHP_EXTENSIONS##*amqp*}" ]; then
    echo "---------- Install amqp ----------"
    apk add --no-cache rabbitmq-c
    pecl install amqp
fi

# if [ -z "${PHP_EXTENSIONS##*pdo_mysql*}" ]; then
#     echo "---------- Install pdo_mysql ----------"
#     docker-php-ext-install ${MC} pdo_mysql
# fi

# if [ -z "${PHP_EXTENSIONS##*mysqli*}" ]; then
#     echo "---------- Install mysqli ----------"
# 	docker-php-ext-install ${MC} mysqli
# fi