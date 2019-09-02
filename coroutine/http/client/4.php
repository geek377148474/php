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
    Coroutine\Http\Client->get
    发起GET请求，函数原型：

    function Swoole\Coroutine\Http\Client->get(string $path);
    $path 设置URL路径，如/index.html，注意这里不能传入http://domain
    使用get会忽略setMethod设置的请求方法，强制使用GET
    使用实例
*/

    $cli->get('/index.php');
    echo $cli->body;
    $cli->close();

});
