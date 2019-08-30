<?php

namespace coroutine;

use co;
use Swoole\Coroutine;

/**
 * 协程是基于用户级线程实现的 所有线程共享创建它的进程的资源
 * 数据进程安全 协程新起线程 另走线程 用户态(New a Thread)
 * 由自己调度程序 非系统调度
 */

$coros = Coroutine::list();
var_dump($coros);

foreach($coros as $cid)
{
    var_dump(Coroutine::getBackTrace($cid));
}

go(function(){
    echo co::getCid();
});

go(function(){
    co::sleep(1);
    echo co::getCid();
});

echo 'will be done in a minute';