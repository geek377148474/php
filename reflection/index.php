<?php
require 'common/function.php';
$dir = 'reflection';// 工作目录
if (dirname($_SERVER['SCRIPT_FILENAME']) != $dir) {
    chdir($dir);
}

/**
 * @ReflectionFunction
 * 
 * getFileName              函数所在的文件位置
 * getStartLine             函数的起始位置
 * getEndLine               函数的结束位置
 * getDocComment            函数的注释
 * getNumberOfParameters    函数的参数个数
 * getParameters            函数的参数
 * getReturnType            函数的返回值
 */
/**
 * @ReflectionClass
 * 
 * getMethods               获取所有的方法
 * hasMethod                是否有某方法
 * getMethod                直接获取方法的对象ReflectionMethod
 */
/**
 * @ReflectionMethod
 * 
 * isPrivate                是否是私有方法
 * isPublic                 是否是公有方法
 * isAbstract               是否是抽象方法
 * isStatic                 是否是静态方法
 * invoke                   通过反射调用对象静态该方法或对象拥有该方法
 *                          调用必须是静态的或者有对象(parse to memory编译到内存中)
 * invokeArgs               类似invoke，但第二个参数是方法调用的参数的集合为数组
 */
/**
 * @题外话
 * 
 * Method和Function的不同请查阅 全文说明 @README.MD
 */


#====== Reflection of Function ======#
/**
 * 函数信息
 */
// require 'ReflectionFunction.php';


#====== Reflection of Class(Reflection of Method) ======#
/**
 * 类信息
 */
// require 'ReflectionClass.php';


#====== Dynamic Proxy ======#
/**
 * 动态代理
 * 
 * 消息的转发，
 * 交给其他类处理，
 * iOS可以通过delegate实现，
 * 也可以在运行时通过相应的方法转发。
 */
// require 'DynamicProxy.php';


#====== Plugin File ======#
/**
 * 插件案列
 * 
 * 通过规范插件接口
 * 利用反射机制
 * 调用他们的showMenu
 * 获取所有menu到menus中
 */
require 'PluginFile.php';