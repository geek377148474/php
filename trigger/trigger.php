<?php

/**
 * 1.绑定事件 支持一个事件绑定多个动作，支持绑定一次性事件
 * 2.触发事件
 * 3.注销事件
 */
class Event
{
    protected static $listens       = array();

    public static function listen($event, $callback, $once = false)
    {
        if (!is_callable($callback)) return false;
        self::$listens[$event][]    = array('callback' => $callback, 'once' => $once);
        return true;
    }

    public static function one($event, $callback)
    {
        return self::listen($event, $callback, true);
    }

    public static function remove($event, $index = null)
    {
        if (is_null($index))
            unset(self::$listens[$event]);
        else
            unset(self::$listens[$event][$index]);
    }

    public static function trigger()
    {
        if (!func_num_args()) return;
        $args                       = func_get_args();
        $event                      = array_shift($args);
        if (!isset(self::$listens[$event])) return false;
        foreach ((array) self::$listens[$event] as $index => $listen) {
            $callback               = $listen['callback'];
            $listen['once'] && self::remove($event, $index);
            call_user_func_array($callback, $args);
        }
    }
}



// 增加监听walk事件 
Event::listen('walk', function () {
    echo "I am walking...n";
});
// 增加监听walk一次性事件 
Event::listen('walk', function () {
    echo "I am listening...n";
}, true);
// 触发walk事件 
Event::trigger('walk');
/* 
I am walking... 
I am listening... 
*/
Event::trigger('walk');
/* 
I am walking... 
*/

Event::one('say', function ($name = '') {
    echo "I am {$name}n";
});

Event::trigger('say', 'deeka'); // 输出 I am deeka 
Event::trigger('say', 'deeka'); // not run 

class Foo
{
    public function bar()
    {
        echo "Foo::bar() is calledn";
    }

    public function test()
    {
        echo "Foo::foo() is called, agrs:" . json_encode(func_get_args()) . "n";
    }
}

$foo    = new Foo;

Event::listen('bar', array($foo, 'bar'));
Event::trigger('bar');

Event::listen('test', array($foo, 'test'));
Event::trigger('test', 1, 2, 3);

class Bar
{
    public static function foo()
    {
        echo "Bar::foo() is calledn";
    }
}

Event::listen('bar1', array('Bar', 'foo'));
Event::trigger('bar1');

Event::listen('bar2', 'Bar::foo');
Event::trigger('bar2');

function bar()
{
    echo "bar() is calledn";
}

Event::listen('bar3', 'bar');
Event::trigger('bar3');
