<?php
/**
 * Created by PhpStorm.
 * User: wangguodong
 * Date: 17/3/2
 * Time: 下午10:44
 */

/**
 * 这是testfun的注释
 */
function testfun($name = 'test'){
    echo "this is a $name method";
    return 'a';
}

testfun();
//通过一个函数名初始化一个函数反射对象,取获取函数的相关信息
$ref_fun = new ReflectionFunction('testfun');
//函数的所在的文件
echo '<br>函数的文件位置是:'.$ref_fun->getFileName();
//获取函数的开始行编号
echo '<br>函数的起始位置是:'.$ref_fun->getStartLine();
//获取函数末尾的编号
echo '<br>函数的结束位置是:'.$ref_fun->getEndLine();
//函数的注释
echo '<br>函数的注释是:'.$ref_fun->getDocComment();
//获取参数的个数
echo '<br>函数的参数个数是:'.$ref_fun->getNumberOfParameters();
//获取具体的参数信息
echo '<br>函数的参数是:';print_r($ref_fun->getParameters());
//函数的返回值 --这里提示这个方法不存在
echo '<br>函数的返回值是:'.$ref_fun->getReturnType();

//如果反射一个不存在的函数,会抛出一个异常,应该try catch 使用
try{
    $ref_nfun = new ReflectionFunction('no_exist');
}catch (ReflectionException $e){
    echo $e->getMessage();
}