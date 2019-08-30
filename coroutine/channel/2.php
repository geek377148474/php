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
        $data = $chan->pop();
        var_dump($data);
    }
});

/*
consumer_num 消费者数量，表示当前通道为空，有N个协程正在等待其他协程调用push方法生产数据
producer_num 生产者数量，表示当前通道已满，有N个协程正在等待其他协程调用pop方法消费数据
queue_num 通道中的元素数量
 */
\Swoole\Coroutine::create(function() use ($chan){
    var_dump($chan->stats());
});
