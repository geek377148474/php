<?php

use Swoole\Coroutine as Co;

/*
Coroutine\Scheduler->parallel
添加并行任务。函数原型：

function Coroutine\Scheduler->parallel(int $n, callable $fn, ... $args);
$n 启动协程的个数
$fn 协程函数
$args 协程可选参数
与add方法不同，parallel方法会创建并行协程。在start时会同时启动$n个$fn协程，并行地执行。
*/

$sch = new Co\Scheduler;

$sch->parallel(10, function ($t, $n) {
    Co::sleep($t);
    echo "Co ".Co::getCid()."\n";
}, 0.05, 'A');

/*
启动程序。此函数不接受任何参数。

function Coroutine\Scheduler->start();
遍历add和parallel方法添加的协程任务，并执行。

启动成功，会执行所有添加的任务，所有协程退出时start会返回true
启动失败返回false，原因可能是已经启动了或者已经创建了其他调度器无法再次创建
*/
$sch->start();