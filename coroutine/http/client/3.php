<?php

/*
添加POST文件。

function Coroutine\Http\Client->addFile(string $path, string $name,
    string $mimeType = null, string $filename = null, int $offset = 0, int $length = 0)
$path 文件的路径，必选参数，不能为空文件或者不存在的文件
$name 表单的名称，必选参数，FILES参数中的key
$mimeType 文件的MIME格式，可选参数，底层会根据文件的扩展名自动推断
$filename 文件名称，可选参数，默认为basename($path)
$offset 上传文件的偏移量，可以指定从文件的中间部分开始传输数据。此特性可用于支持断点续传。
$length 发送数据的尺寸，默认为整个文件的尺寸
使用addFile会自动将POST的Content-Type将变更为form-data。addFile底层基于sendfile，可支持异步发送超大文件。

addFile在2.1.2以上版本可用
*/
$cli = new Swoole\Coroutine\Http\Client('127.0.0.1', 80);
$cli->setHeaders([
    'Host' => "www.php.com"
]);
$cli->set(['timeout' => -1]);
$cli->addFile(__FILE__, 'file1', 'text/plain');
$cli->post('/post', ['foo' => 'bar']);
echo $cli->body;
$cli->close();

/*
Coroutine\Http\Client->addData
使用字符串构建上传文件内容

function Coroutine\Http\Client->addData(string $data, string $name, string $mimeType = null,
    string $filename = null)
$data 数据内容，必选参数，最大长度不得超过buffer_output_size
$name 表单的名称，必选参数，$_FILES参数中的key
$mimeType 文件的MIME格式，可选参数，默认为application/octet-stream
$filename 文件名称，可选参数，默认为$name
使用addData会自动将POST的Content-Type将变更为form-data。

addData在4.1.0以上版本可用
*/
$cli = new Swoole\Coroutine\Http\Client('127.0.0.1', 80);
$cli->setHeaders([
    'Host' => "www.php.com"
]);
$cli->set(['timeout' => -1]);
$cli->addData(Co::readFile(__FILE__), 'file1', 'text/plain');
$cli->post('/post', ['foo' => 'bar']);
echo $cli->body;
$cli->close();