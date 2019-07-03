<?php

class Singleton
{
    /**
     * 自身实例
     *
     * @var [type]
     */
    private static $_instance;

    /**
     * 自身无法实例化
     */
    protected function __construct()
    { }

    /**
     * 无法被克隆
     *
     * @return string
     */
    protected function __clone()
    {
        return 'clone is forbidden';
    }

    /**
     * 获取自身实例
     *
     * @return object
     */
    public static function getInstance()
    {
        if (!static::$_instance instanceof self) {
            static::$_instance = new self();
            return static::$_instance;
        }
        return static::$_instance;
    }

    /**
     * 测试方法
     *
     * @return string
     */
    public function test()
    {
        return 'this is a test' . PHP_EOL;
    }
}

echo Singleton::getInstance()->test();
// $Singleton = clone Singleton::getInstance();
