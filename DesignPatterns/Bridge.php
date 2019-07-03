<?php

/**
 * 吃抽象接口
 */
interface EatInterface
{
    public function eat($food = '');
}
/**
 * 用筷子吃实类
 */
class EatByChopsticks implements EatInterface
{
    public function eat($food = '')
    {
        echo "用筷子吃{$food}";
    }
}
/**
 * 用叉子吃实体
 */
class EatByFork implements EatInterface
{
    public function eat($food = '')
    {
        echo "用叉子吃{$food}~";
    }
}

/**
 * 人抽象类
 */
abstract class AbstractPerson
{
    /**
     * 性别
     * @var string $_gender
     */
    public $_gender = '';

    /**
     * 吃的工具
     * @var [type]
     */
    public $_tool;

    public function __construct($gender, EatInterface $tool)
    {
        $this->_gender = $gender;
        $this->_tool = $tool;
    }
    /**
     * 吃的行为
     *
     * @param string $food
     * @return void
     */
    abstract public function eat($food = '');
}
/**
 * 男人实类
 */
class PersonMale extends AbstractPerson
{
    public function eat($food = '')
    {
        $this->_tool->eat($food);
    }
}

try {
    // 初始化一个用筷子吃饭的男人的实例
    $male = new PersonMale('male', new EatByChopsticks());
    // 吃饭
    $male->eat('大盘鸡');
} catch (\Exception $e) {
    echo $e->getMessage();
}
