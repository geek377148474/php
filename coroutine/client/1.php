<?php

use Swoole\Coroutine as co;

co::create(function(){
    $client = new co\Client(SWOOLE_SOCK_TCP);

    if (!$client->connect('127.0.0.1', 9601, 0.5))
    {
        exit("connect failed. Error: {$client->errCode}".PHP_EOL);
    }

    // 必须加() 否则先运算 (&& ...)
    ($data = ['msg' => 'hello']) && ($json=json_encode($data));
    // ($data = ['msg' => 'shutdown']) && ($json=json_encode($data));
    $client->send(json_encode($data));

    echo $client->recv();

    $client->close();
});
