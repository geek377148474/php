<?php

namespace coroutine;

use co;

/**
 * 创建协程
 */
class test
{
    function foo()
    {
        echo __CLASS__ . '@' . __FUNCTION__ . ' be called' . PHP_EOL;
    }
}

function test()
{
    co::sleep(1);
    echo __METHOD__ . ' be called' . PHP_EOL;
}

go(function () {
    co::sleep(0.5);
    echo "hello" . PHP_EOL;
});#1
go("test");#2
go(['test', "foo"]);#3

