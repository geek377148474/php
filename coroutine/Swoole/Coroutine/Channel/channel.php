<?php
use \Swoole\Coroutine\Channel;
/*
#1处代码会首先执行，然后遇到pop(),因为channel还是空，会等待2s。
此时协程会让出cpu,跳到第二个协程执行，然后#2出睡眠1秒，push变量1进去channel后返回#1处继续执行，成功取车通过中刚push的值1.
*/
$chan = new Channel();
go(function () use ($chan) {
    echo "我是第一个协程，等待3秒内有push就执行返回" . PHP_EOL;
    $p = $chan->pop(2);#1
    echo "pop返回结果" . PHP_EOL;
    var_dump($p);
});
go(function () use ($chan) {
    co::sleep(1);#2
    $chan->push(1);
});
echo "main" . PHP_EOL;

/**
 *
 */