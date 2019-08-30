<?php
/*

function Swoole\Coroutine::create(callable $function, ...$args) : int|false;
function go(callable $function, ...$args) : int|false; // 短名API swoole.use_shortname='On' 默认

 */

/**
 * 协程的客户端内执行其实是同步的，不要理解为异步，它只是遇到IO阻塞时能让出执行权，切换到其他协程而已，不能和异步混淆。
 */

go(function () {
    $start = microtime(true);
    $db = new Swoole\Coroutine\MySQL();
    $db->connect([
        'host' => '127.0.0.1',
        'port' => 3306,
        'user' => 'localuser',
        'password' => '8212',
        'database' => 'test',
        'timeout' => 4#1
    ]);
    if ($db->connect_errno != 0) {
        throw new \Exception('connected fail:'.$db->connect_error);
    }
    $db->query("select sleep(5)");
    echo "我是第一个sleep五秒之后\n";
    $ret = $db->query("select id from address limit 1");#2
    var_dump($ret);
    $use = microtime(true) - $start;
    echo "协程mysql输出用时：" . $use . PHP_EOL;
});