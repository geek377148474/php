<?php
/*


# alpine linux 为例, 其他 linux 发行版, 使用相应包管理工具安装
apk add protobuf
protoc --version # 验证 protoc 是否安装成功

# 使用 protoc 生成代码
protoc --php_out=grpc/ game.proto # 使用 --php_out 选项, 指定生成 PHP 代码的路径


// ext-protobuf
pecl install protobuf

// google/protobuf
composer require google/protobuf