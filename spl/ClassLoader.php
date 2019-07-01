<?php

//定义一个替换__autoload函数的类文件装载函数
function ClassLoader($class_name)
{
    echo 'classloader() load class : ' . $class_name . PHP_EOL;
    spl_autoload_extensions('.php');
    //当我们不用require_once或require载入类文件的时候，而想通过系统查找include_path来装载类时，必须显式调用spl_autoload函数，参数是类的名称来重启类文件的自动查找（装载）
    set_include_path(__DIR__ . '/libs/');
    spl_autoload($class_name);
    // include $class_name . '.php';
}
//传入定义好的装载类的函数的名称替换__autoload函数
spl_autoload_register('ClassLoader');

new Test();
