<?php

namespace scheduler;

use Swoole\Coroutine\Scheduler;
use Swoole\Coroutine as Co;

/*
协程调度器类，4.4版本后推荐使用Coroutine\Scheduler作为cli script模式的编码风格。

新增Swoole\Coroutine\Scheduler调度器类作为cli命令行脚本的入口，取代go() + Swoole\Event::wait()的方式
增加Swoole\Coroutine\Run函数，提供对Swoole\Coroutine\Scheduler的封装
*/

$scheduler = new Scheduler;
$scheduler->add(function () {
    Co::sleep(1);
    echo "Done.\n";
});
$scheduler->start();


// Co\run(function () {
//     Co::sleep(1);
//     echo "Done.\n";
// });