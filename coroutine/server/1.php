<?php

namespace server;

use Swoole\Coroutine\Server;
use Swoole\Coroutine\Server\Connection;

class Assert{
    static function eq($bool, $select, $value){
        if (!$bool || $select !== $value)
            return false;// throw new \Exception('eq fail');
        return true;
    }
}

\Swoole\Coroutine::create(function () {
    $server = new Server('0.0.0.0', 9601, false);
    $server->handle(function (Connection $conn) use ($server) {
        while(true) {
            $data = $conn->recv();
            $json = json_decode($data, true);

            if (empty($json)) return;

            if (Assert::eq(is_array($json), $json['msg'], 'hello')) $conn->send("world".PHP_EOL);

            if (Assert::eq(is_array($json), $json['msg'], 'shutdown')) $conn->send("shutdown".PHP_EOL) && $server->shutdown();
        }
    });
    $server->start();
});