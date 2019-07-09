<?php

/**
 * 动物接口
 */
interface AnimailInterface
{
    /**
     * 行为吃
     * 
     * @param  VisitorInterface $visitor 访问者
     * @return void
     */
    public function eat(VisitorInterface $visitor);
}

/**
 * 访问者接口
 */
interface VisitorInterface
{
    /**
     * 行为吃
     * 
     * @return void
     */
    public function eat();
}

/**
 * 实体人
 *
 * 人吃饭的行为是不变的,但是吃什么是依照环境而定的
 */
class Person implements AnimailInterface
{
    /**
     * 行为吃
     * 具体吃什么依照访问者而定
     * 
     * @param  VisitorInterface $visitor 访问者
     * @return void
     */
    public function eat(VisitorInterface $visitor)
    {
        $visitor->eat();
    }
}

/**
 * 访问者实体
 * 
 * 亚洲
 */
class VisitorAsia implements VisitorInterface
{

    public function eat()
    {
        echo "身处亚洲，所以主要吃大米咯~ \n";
    }
}

/**
 * 访问者实体
 * 
 * 亚洲
 */
class VisitorAmerica implements VisitorInterface
{

    public function eat()
    {
        echo "身处美洲，所以主要吃油炸食物咯~ \n";
    }
}

// 生产一个人的实例
$person = new Person();

// 来到了亚洲
$person->eat(new VisitorAsia());

// 来到了美洲
$person->eat(new VisitorAmerica());
