<?php

/*
升级为WebSocket连接。

function Coroutine\Http\Client->upgrade(string $path);
请求失败返回false，成功返回true
某些情况下请求虽然是成功的，upgrade返回了true，但服务器并未设置HTTP状态码为101，而是200或403，这说明服务器拒绝了握手请求
WebSocket握手成功后可以使用push方法向服务器端推送消息，也可以调用recv接收消息
upgrade会产生一次协程调度
*/
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
/*
Coroutine\Http\Client->push
向WebSocket服务器推送消息。

function Coroutine\Http\Client->push(mixed $data, int $opcode = WEBSOCKET_OPCODE_TEXT,
    bool $finish = true): bool
push方法必须在upgrade成功之后才能执行
push方法不会产生协程调度，写入发送缓存区后会立即返回
参数模式1
$data 要发送的数据内容，默认为UTF-8文本格式，如果为其他格式编码或二进制数据，请使用WEBSOCKET_OPCODE_BINARY
$opcode操作类型，默认为WEBSOCKET_OPCODE_TEXT表示发送文本
$opcode必须为合法的WebSocket OPCODE，否则会返回失败，并打印错误信息opcode max 10
参数模式2
需要4.2.0及以上版本

$data 可以使用Swoole\WebSocket\Frame对象, 支持发送各种帧类型
返回值
发送成功，返回true
连接不存在、已关闭、未完成WebSocket，发送失败返回false
错误码
8502：错误的OPCODE
8503：未连接到服务器或连接已被关闭
8504：握手失败
*/



