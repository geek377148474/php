<?php

use Swoole\Coroutine as co;

$chan = new co\Channel(2);

co::create(function () use ($chan) {
    for ($i = 0; $i < 100000; $i++) {
        co::sleep(1.0);
        $chan->push(['rand' => rand(1000, 9999), 'index' => $i]);
        echo "$i\n";
    }
});

co::create(function () use ($chan) {
    while (1) {
        co::sleep(2.0);
        $data = $chan->pop();
        var_dump($data);
    }
});
/*
Coroutine\Channel->isFull
判断当前通道是否已满，函数原型：

public function isFull(): bool
 */
co::create(function () use ($chan) {
    while (1) {
        co::sleep(1.0);
        $ifEmpty = function (co\Channel $chan) {
            if ($chan->isFull()) {
                return '是' . PHP_EOL;
            } else {
                return '否' . PHP_EOL;
            }
        };
        echo sprintf('当前通道是否已满：%s', $ifEmpty($chan));
    }
});