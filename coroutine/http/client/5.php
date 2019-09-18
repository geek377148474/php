<?php

use Swoole\Coroutine as Co;
use Swoole\Coroutine\Http\Client;

Co::create(function(){
    $cli = new Client('127.0.0.1', 80);
    $cli->setHeaders([
        'Host' => "www.php.com",
        "User-Agent" => 'Chrome/49.0.2587.3',
        'Accept' => 'text/html,application/xhtml+xml,application/xml',
        'Accept-Encoding' => 'gzip',
    ]);

/*
    Coroutine\Http\Client->post
    发起POST请求，函数原型：

    function Swoole\Coroutine\Http\Client->post(string $path, mixed $data);
    $path 设置URL路径，如/index.html，注意这里不能传入http://domain
    $data 请求的包体数据，如果$data为数组底层自动会打包为x-www-form-urlencoded格式的POST内容，并设置Content-Type为application/x-www-form-urlencoded
    使用post会忽略setMethod设置的请求方法，强制使用POST
*/

    $cli->post('/index.php', array("a" => '123', 'b' => '456'));
    echo $cli->body;
    $cli->close();

});
