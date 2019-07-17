<?php
// 闭包可以作为参数传递到函数或类方法中使用

class Lang
{
    private $name = 'php';
}
$closure = function () {
    return $this->name;
};
$bind_closure = Closure::bind($closure, new Lang(), 'Lang');
echo $bind_closure(); //php

// Closure {
//     /* 方法 */
//     __construct ( void )
//     public static bind ( Closure $closure , object $newthis [, mixed $newscope = 'static' ] ) : Closure
//     public bindTo ( object $newthis [, mixed $newscope = 'static' ] ) : Closure
// }
// Closure::__construct — 用于禁止实例化的构造函数
// Closure::bind — 复制一个闭包，绑定指定的$this对象和类作用域。
// Closure::bindTo — 复制当前闭包对象，绑定指定的$this对象和类作用域


class A {
    function __construct($val) {
        $this->val = $val;
    }
    function getClosure() {
        //returns closure bound to this object and scope
        return function() { return $this->val; };
    }
}

$ob1 = new A(1);
$ob2 = new A(2);

$cl = $ob1->getClosure();
echo $cl(), "\n"; // 1
$cl = $cl->bindTo($ob2);
echo $cl(), "\n"; // 2