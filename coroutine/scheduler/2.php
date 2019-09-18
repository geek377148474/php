<?php

namespace scheduler;

use Swoole\Coroutine as Co;

/*
设置协程运行时参数。是Coroutine::set方法的别名
函数原型：
function Coroutine\Scheduler->set(array $options);
$options要设置的参数
*/
$sch = new Co\Scheduler;
$sch->set(['max_coroutine' => 100]);

/*
添加任务。
函数原型：
function Coroutine\Scheduler->add(callable $fn, ... $args);
$fn要运行的协程函数
$args可选参数，将传递给协程
与go函数不同，这里添加的协程不会立即执行，而是等待调用start方法时，一起启动并执行。

如果程序中仅添加了协程，未调用start启动，协程函数$fn将不会被执行。
*/
$sch->add(function ($a, $b) {
    Co::sleep(1);
    assert($a == 'hello');
    assert($b == 12345);
    echo "Done.\n";
}, "hello", 12345);

/**
 * @param $closure
 * @param $a
 * @param $b
 * @param $c
 * @return mixed
 */
$test = function($closure,$a,$b){
    return $closure($a, $b);
};
/*
 * a closure for test
 */
$test(function($a, $b){
    echo $a . $b . '3.' . PHP_EOL;
},1,2);

$sch->start();
