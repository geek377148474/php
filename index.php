<?php
require 'common/function.php';

if (dirname($_SERVER['SCRIPT_FILENAME']) != 'DesignPatterns') {
    chdir('DesignPatterns');
}

# [单例模式]
// require 'Singleton.php';

# [工厂模式]
/**
 * 创建型模式
 * 
 * 工厂方法模式和抽象工厂模式的核心区别
 * 工厂方法模式利用继承，抽象工厂模式利用组合
 * 工厂方法模式产生一个对象，抽象工厂模式产生一族对象
 * 工厂方法模式利用子类创造对象，抽象工厂模式利用接口的实现创造对象
 * 工厂方法模式可以退化为简单工厂模式(非23中GOF)
 */
// require 'Factory.php';

# [抽象工厂模式]
/* 
* 创建型模式
*
* 说说我理解的工厂模式和抽象工厂模式的区别：
* 工厂就是一个独立公司，负责生产对象；
* 抽象工厂就是集团，负责生产子公司（工厂）；
*/
// 适用于更大型设计，比如框架
// 模拟调用， 抽象工厂模式核心是面向接口编程
// require 'AbstractFactory.php';

# [原型模式]
/**
 * 创建型模式
 *
 * php原型模式
 * 用于创建对象成本过高时
 */
require 'Prototype.php';


# [服务提供者] ServiceProvider
// require 'ServiceProvider.php';
