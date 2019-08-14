<?php

/**
 * @forward_static_call
 * 
 * 只能从类方法中调用
 * 调用作用域先从当前类中查找
 * 如果没有对应的变量则会到方法相应的类中查找
 */

class A
{
    const NAMEA = 'A';
    public static function test()
    {
        $args = func_get_args();
        echo static::NAMEA, " " . join(',', $args) . " \n";
    }
}

class B extends A
{
    const NAME = 'B';
    const NAMEA = 'B';

    public static function test()
    {
        echo self::NAME, "\n";
        forward_static_call(array('A', 'test'), 'more', 'args');
        forward_static_call('test', 'other', 'args');
    }
}

B::test('foo');

function test()
{
    $args = func_get_args();
    echo "C " . join(',', $args) . " \n";
}
