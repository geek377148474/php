<?php

interface Factory
{
    public static function produce();
}

class Zoo implements Factory
{
    public function __construct()
    {
        echo '初始化了动物园，可根据需求生产Chicken and Pig' . PHP_EOL;
    }

    public static function produce($type = ""): Animal
    {
        switch ($type) {
            case 'chicken':
                return  new Chicken();
                break;
            case 'pig':
                return  new Pig();
                break;
            default:
                return '该农场不支持生产该农物~' . PHP_EOL;
                break;
        }
    }
}

interface Animal
{ }

class Chicken implements Animal
{
    public function __construct()
    {
        echo '生产了一只猪' . PHP_EOL;
    }
}

class Pig implements Animal
{
    public function __construct()
    {
        echo '生产了一只鸡' . PHP_EOL;
    }
}

Zoo::produce("chicken");
Zoo::produce("pig");
