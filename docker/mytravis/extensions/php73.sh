#!/bin/sh

echo
echo "============================================"
echo "Install extensions from   : ${MORE_EXTENSION_INSTALLER}"
echo "PHP version               : ${PHP_VERSION}"
echo "Extra Extensions          : ${PHP_EXTENSIONS}"
echo "Multicore Compilation     : ${MC}"
echo "Work directory            : ${PWD}"
echo "============================================"
echo


# 实际上此处所有extension都会安装 因为EXTENSIONS为空

# if [ -z "${SWOOLE_VERSION##*swoole-4.3*}" ]; then
#     echo "---------- Install swoole-4.3 ----------"
#     mkdir swoole \
#     && tar -xf swoole-src-4.3.6.tgz -C swoole --strip-components=1 \
#     && ( cd swoole && phpize && ./configure --enable-openssl && make ${MC} && make install ) \
#     && docker-php-ext-enable swoole
# fi

# if [ -z "${SWOOLE_VERSION##*swoole-4.4*}" ]; then
#     echo "---------- Install swoole-4.4 ----------"
#     mkdir swoole \
#     && tar -xf swoole-src-4.4.2.tgz -C swoole --strip-components=1 \
#     && ( cd swoole && phpize && ./configure --enable-openssl && make ${MC} && make install ) \
#     && docker-php-ext-enable swoole
# fi

# if [ -z "${EXTENSIONS##*redis*}" ]; then
#     echo "---------- Install redis ----------"
#     mkdir redis \
#     && tar -xf redis-4.1.1.tgz -C redis --strip-components=1 \
#     && ( cd redis && phpize && ./configure && make ${MC} && make install ) \
#     && docker-php-ext-enable redis
# fi