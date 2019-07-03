<?php

interface AnimalInterface
{
    /**
     * 打印类型
     *
     * @return void
     */
    public function getType();
}

class Chicken implements AnimalInterface
{
    public function getType()
    {
        echo '养只' . __CLASS__ . PHP_EOL;
    }
}

class Pig implements AnimalInterface
{
    public function getType()
    {
        echo '养只' . __CLASS__ . PHP_EOL;
    }
}

class FarmException
{
    public function getType()
    {
        echo '农产不支持生产该农作物' . PHP_EOL;
    }
}

class Farm
{
    /**
     * 对象缓存池
     */
    private $_farmMap = [];

    /**
     * 构造函数
     */
    public function __construct()
    {
        echo '初始化了个农场，准备养些什么' . PHP_EOL;
    }

    public function produce($type = ''): object
    {
        if (key_exists($type, $this->_farmMap)) {
            return $this->_farmMap[$type];
        }
        switch ($type) {
            case "chicken":
                return new Chicken();
                break;
            case "pig":
                return new Pig();
                break;
            default:
                return new FarmException();
                break;
        }
    }
}

$Farm = new Farm();
$Farm->produce("chicken")->getType();
$Farm->produce("pig")->getType();
$Farm->produce("dog")->getType();
