<?php
class AAA{
    static $a = 1;
    public function __destruct()
    {
        echo self::$a;
    }
}

class BBB extends AAA{
    static $a = 2;

}

new BBB(); // 1

class AA{
    static $a = 1;
    public function __destruct()
    {
        echo static::$a;
    }
}

class BB extends AA{
    static $a = 2;

}

new BBB(); // 2