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

/**
 * 获取通道中的元素数量
 * Coroutine\Channel->length
 * public function length(): int
 */
co::create(function () use ($chan) {
    while(1) {
        co::sleep(3.0);
        $length = $chan->length();
        var_dump('元素数量:' . $length);
    }
});
