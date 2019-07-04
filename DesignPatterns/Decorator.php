<?php

/**
 * 鞋类接口
 */
interface ShoesInterface
{
    public function produce();
}

class ShoesSport implements ShoesInterface
{
    public function produce()
    {
        echo '生产一双' . __CLASS__ . PHP_EOL;
    }
}

class ShoesSkateboard implements ShoesInterface
{
    public function produce()
    {
        echo '生产一双' . __CLASS__ . PHP_EOL;
    }
}

/**
 * 装饰器抽象类
 */
abstract class Decorator
{
    /**
     * 产品生产线对象
     * @var object
     */
    private $shoes;
    /**
     * 构造方法
     *
     * @param ShoesInterface $shoes
     */
    public function __construct(ShoesInterface $shoes)
    {
        $this->shoes = $shoes;
    }

    /**
     * 生产
     *
     * @return void
     */
    public function produce()
    {
        $this->shoes->produce();
    }

    abstract function decorate();
}

class DecoratorBrand
{
    /**
     * 标签
     * @var [type]
     */
    private $_brand;

    public function __construct(ShoesInterface $shoes)
    {
        $this->shoes = $shoes;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function produce()
    {
        $this->shoes->produce();
        $this->decorate($this->_brand);
    }

    public function decorate()
    {
        echo "贴上{$this->_brand}标签" . PHP_EOL;
    }
}

$shoesSport = new ShoesSport();
$shoesSport->produce();
$decorator = new DecoratorBrand(new ShoesSport());
$decorator->_brand = 'nike';
$decorator->produce();
