<?php


trait trait1{
    public function fun1(){
        echo 'trait1';
    }
 
}
 
class base {
    public function fun1(){
        echo 'base';
    }
}
 
class class1 extends base {
    use trait1;
}
 
$ref = new ReflectionClass('class1');
$class1 = $ref->newInstanceArgs();
 
//执行结果“trait1”,结论，同样的方法名，在同级类中，trait方法比继承的方法优先级更高
$class1->fun1();