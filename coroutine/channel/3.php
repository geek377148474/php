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
close == stop
关闭通道。并唤醒所有等待读写的协程。
唤醒所有生产者协程，push方法返回false
唤醒所有消费者协程，pop方法返回false
 */
\Swoole\Coroutine::create(function() use ($chan){
    co::sleep(3);
    var_dump($chan->close());
});
