<?php

use Swoole\Coroutine as Co;
use Swoole\Coroutine\Http\Client;

/*
Coroutine\Http\Client->recv
接收消息。与setDefer或upgrade配合使用。

function Coroutine\Http\Client->recv(float $timeout = -1);
$timeout 为upgrade升级为websocket时可用的超时参数
$timeout 设置超时，优先使用指定的参数，其次使用set方法中传入的timeout配置
未设置任何超时，将持续等待
$timeout参数需要2.1.2或更高版本
*/

// Http
// go(function () {
//     $cli = new Swoole\Coroutine\Http\Client('127.0.0.1', 80);
//     $cli->setHeaders([
//         'Host' => "localhost",
//         "User-Agent" => 'Chrome/49.0.2587.3',
//         'Accept' => 'text/html,application/xhtml+xml,application/xml',
//         'Accept-Encoding' => 'gzip',
//     ]);
//     $cli->set([ 'timeout' => 1]);
//     $cli->setDefer();
//     $cli->get('/');
//     co::sleep(1);
//     $data = $cli->recv();
// });


// WebSocket
go(function () {
    $cli = new Co\http\Client("127.0.0.1", 9502);
    $ret = $cli->upgrade("/");

    if ($ret) {
        while(true) {
            $cli->push("hello");
            var_dump($cli->recv());
            co::sleep(0.1);
        }
    }
});