<?php

use Swoole\Coroutine as Co;
use Swoole\Coroutine\Http\Client;

Co::create(function() {
    $cli = new Client('127.0.0.1', 80);
    $cli->setHeaders([
        'Host' => "www.php.com",
        "User-Agent" => 'Chrome/49.0.2587.3',
        'Accept' => 'text/html,application/xhtml+xml,application/xml',
        'Accept-Encoding' => 'gzip',
    ]);
/*
    Coroutine\Http\Client->setMethod
    设置Http请求方法

    function Coroutine\Http\Client->get->setMethod(string $method);
    $client->setMethod("PUT");
    $method 必须为符合Http标准的方法名称，如果$method设置错误可能会被Http服务器拒绝请求
    setMethod 仅在当前请求有效，发送请求后会立刻清除method设置
*/
    $cli->setMethod('get');

/*
    设置Cookie

    function Coroutine\Http\Client->setCookies(array $cookies);
    $cookies 设置COOKIE，必须为键值对应数组
    设置COOKIE后在客户端对象存活期间会持续保存
    服务器端主动设置的COOKIE会合并到cookies数组中，可读取$client->cookies属性获得当前Http客户端的COOKIE信息
    重复调用setCookies方法，会覆盖当前的Cookies状态，这会丢弃之前服务器端下发的COOKIE以及之前主动设置的COOKIE
*/
    $cli->setCookies('MYSESSIONID', 'aaa');
/*
    Coroutine\Http\Client->setData
    设置Http请求的包体

    function Coroutine\Http\Client->setData(string $data);
    $data 为字符串格式
    设置$data后并且未设置$method，底层会自动设置为POST
    未设置Http请求包体并且未设置$method，底层会自动设置为GET
*/
    $cli->setData('bbb');



});

