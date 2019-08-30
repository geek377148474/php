<?php

use Swoole\Coroutine as co;

$chan = new co\channel(2);

/*
Coroutine\Channel->$errCode
Coroutine\Channel->$errCode

默认成功 0 (SWOOLE_CHANNEL_OK)
超时 pop失败时(超时)会置为-1 (SWOOLE_CHANNEL_TIMEOUT)
channel已关闭,继续操作channel，设置错误码 -2 ( SWOOLE_CHANNEL_CLOSED)
*/

co::create(function() use ($chan){
    $chan->push(1);
    var_dump('#1 errcode:'.$chan->errCode);
    $chan->push(2);
    var_dump('#2 errcode:'.$chan->errCode);
    $chan->push(2);
    // 会启协程 被挂起...等待push
    var_dump('#2 errcode:'.$chan->errCode);
});