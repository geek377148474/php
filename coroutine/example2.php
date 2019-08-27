<?php

namespace  coroutine;

use chan;
use co;
use Swoole\Coroutine\Channel;

$data = [
    'message' => 'hello world',
    'code' => 200,
    'result' => []
];

go(function() use ($data) {
    $c = new channel(1);
    $c->push($data);
    $get = $c->pop();
    var_dump($get);
});


go(function(){
    co::sleep(1);
    echo co::gethostbyname('www.baidu.com');
});
