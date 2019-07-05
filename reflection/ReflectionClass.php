<?php
class Person
{

    public $name, $age, $sex;
    static function show($name, $age, $sex = '男')
    {
        echo "姓名:$name,年龄:$age,性别:$sex".PHP_EOL;
    }
    function say($content)
    {
        echo "我想说的是:$content".PHP_EOL;
    }
    function eat($food = 'apple')
    { }
}
$per = new Person();

$ref = new ReflectionClass('Person'); //参数可以是类名,或者类的实例
//获取类里面的所有方法
$class_methods = $ref->getMethods();
//是一个数组,每个对象包含了方法名和所属类
dump($class_methods);
//是否拥有某个方法
$has_method = $ref->hasMethod('say');
// 通过反射对象的getMethod方法 直接获取一个反射方法 并调用
$say = $ref->getMethod('say');
$say->invoke($per, 'mm你好呀');
//获取某个方法的信息
$some_method = new ReflectionMethod('Person', 'say');
$some_method->isPrivate(); //判断是否私有,还有static,public
//方法的调用,
if ($some_method->isPublic() && !$some_method->isAbstract()) {

    if ($some_method->isStatic()) {
    //静态方法第一个参数是null,后面参数写方法的参数,可以传递一个或者多个,并且这个方法可以接受数量可变的参数。
    /*
     * * The object to invoke the method on. For static methods, pass
     * null to this parameter.
     * </p>
     * @param mixed $parameter [optional] <p>
     * Zero or more parameters to be passed to the method.
     * It accepts a variable number of parameters which are passed to the method.
     * </p>
     */
        $some_method->invoke(null, 'zhangsan', '23');
    } else {
        //非静态方法第一个参数传递一个对象
        $some_method->invoke($per, '生活真好');
    }
}
