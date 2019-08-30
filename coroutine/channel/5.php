<?php

use Swoole\Coroutine as co;

$chan = new co\Channel(10);

co::create(function () use ($chan) {
    for($i = 0; $i < 100000; $i++) {
        co::sleep(1.0);
        $chan->push(['rand' => rand(1000, 9999), 'index' => $i]);
        echo "$i\n";
    }
});

co::create(function () use ($chan) {
    while(1) {
        co::sleep(2.0);
        $data = $chan->pop();
        var_dump($data);
    }
});
/*
Coroutine\Channel->isEmpty
判断当前通道是否为空，函数原型：

public function isEmpty(): bool
 */
co::create(function () use ($chan) {
    while(1) {
        co::sleep(1.0);
        $ifEmpty=function(co\Channel $chan){
            if ($chan->isEmpty()){
                return '是'.PHP_EOL;
            }else{
                return '否'.PHP_EOL;
            }
        };
        echo sprintf('是否空：%s', $ifEmpty($chan));
    }
});