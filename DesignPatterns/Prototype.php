<?php

abstract class PrototypeAbstract
{
    protected $_name;

    /**
     * 打印对象名称
     *
     * @return void
     */
    abstract public function getName();

    /**
     * 获取对象原型
     *
     * @return void
     */
    abstract public function getPrototype();
}

class Prototype extends PrototypeAbstract
{
    /**
     * 构造函数
     *
     * @param string $name 属性
     */
    public function __construct($name = '')
    {
        $this->_name = $name;
    }

    /**
     * 魔术方法 设置属性
     *
     * @param [type] $name 属性名称
     * @param [type] $value 属性值
     */
    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    /**
     * 打印对象名称
     *
     * @return string
     */
    public function getName(): string
    {
        return '我是对象' . $this->_name . PHP_EOL;
    }

    public function getPrototype(): object
    {
        return clone $this;
    }
}

// 创建一个原型对象
$prototype = new Prototype();

// 获取一个原型的克隆
$prototypeCloneOne = $prototype->getPrototype();
$prototypeCloneOne->_name = 'one';
echo $prototypeCloneOne->getName();

// 获取一个原型的克隆
$prototypeCloneTwo = $prototype->getPrototype();
$prototypeCloneTwo->_name = 'two';
echo $prototypeCloneTwo->getName();
