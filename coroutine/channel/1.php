<?php

use Swoole\Coroutine as co;

$chan = new co\Channel(1);

/*
通道，类似于go语言的chan，支持多生产者协程和多消费者协程。底层自动实现了协程的切换和调度。

通道与PHP的Array类似，仅占用内存，没有其他额外的资源申请，所有操作均为内存操作，无IO消耗
底层使用PHP引用计数实现，无内存拷贝。即使是传递巨大字符串或数组也不会产生额外性能消耗

Channel->push ：当队列中有其他协程正在等待pop数据时，自动按顺序唤醒一个消费者协程。当队列已满时自动yield让出控制器，等待其他协程消费数据
Channel->pop：当队列为空时自动yield，等待其他协程生产数据。消费数据后，队列可写入新的数据，自动按顺序唤醒一个生产者协程。

Coroutine\Channel使用本地内存，不同的进程之间内存是隔离的。只能在同一进程的不同协程内进行push和pop操作
Coroutine\Channel在2.0.13或更高版本可用

向通道中写入数据。
function Coroutine\Channel->push(mixed $data, float $timeout = -1) : bool;
$data可以是任意类型的PHP变量，包括匿名函数和资源
为避免产生歧义，请勿向通道中写入空数据，如0、false、空字符串、null
$timeout设置超时时间，在通道已满的情况下，push会挂起当前协程，在约定的时间内，如果没有任何消费者消费数据，将发生超时，底层会恢复当前协程，push调用立即返回false，写入失败
$timeout参数在4.2.12或更高版本可用

从通道中读取数据。
function Coroutine\Channel->pop(float $timeout = 0) : mixed;
返回值可以是任意类型的PHP变量，包括匿名函数和资源
通道并关闭时，执行失败返回false
$timeout指定超时时间，浮点型，单位为秒，最小粒度为毫秒，在规定时间内没有生产者push数据，将返回false
$timeout参数在4.0.3或更高版本可用
 */

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

swoole_event::wait();