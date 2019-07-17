<?php

trait trait1{
    public function fun1(){
        echo 'trait1';
    }
 
}
 
class base {
    use trait1;
    public function fun1(){
        echo 'base';
    }
}
 
class class1 extends base {
 
}
 
$ref = new ReflectionClass('class1');
$class1 = $ref->newInstanceArgs();
 
//执行结果"base",说明trait方法和类方法同级的情况下，类方法优先级更高
$class1->fun1();

