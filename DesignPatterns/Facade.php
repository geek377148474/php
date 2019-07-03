<?php

/**
 * 动物接口
 */
interface AnimalInterface
{
    /**
     * 生产方法
     */
    public function produce();
}

class Chicken implements AnimalInterface
{
    /**
     * 生产方法
     *
     * 生产猪
     * @return void
     */
    public function produce()
    {
        echo '生产了只' . __CLASS__ . PHP_EOL;
    }
}

class Pig implements AnimalInterface
{
    /**
     * 生产方法
     *
     * 生产鸡
     * @return void
     */
    public function produce()
    {
        echo '生产了只' . __CLASS__ . PHP_EOL;
    }
}

class AnimalMaker
{
    /**
     * 鸡工厂实例
     * @var object
     */
    private $_chicken;

    /**
     * 猪工厂实例
     * @var object
     */
    private $_pig;

    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->_chicken = new Chicken();
        $this->_pig = new Pig();
    }

    /**
     * 生产方法
     *
     * 生产猪
     * @return void
     */
    public function produceChicken()
    {
        $this->_chicken->produce();
    }

    /**
     * 生产方法
     *
     * 生产鸡
     * @return void
     */
    public function producePig()
    {
        $this->_pig->produce();
    }
}

$Maker = new AnimalMaker();
$Maker->produceChicken();
$Maker->producePig();
