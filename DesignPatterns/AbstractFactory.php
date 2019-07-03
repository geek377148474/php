<?php

interface LivingFactory
{
    public function createFarm();
    public function createZoo();
}
interface FarmInterface extends Income
{
    public function harvest();
}
interface ZooInterface extends Income
{
    public function show();
}
interface Income
{
    public function money();
}

class PlantFactory implements LivingFactory
{
    public function createFarm()
    {
        return new RiceFarm();
    }
    public function createZoo()
    {
        return new PeonyZoo();
    }
}
class AnimalFactory implements LivingFactory
{
    public function createFarm()
    {
        return new PigFarm();
    }
    public function createZoo()
    {
        return new PandaZoo();
    }
}

class RiceFarm implements FarmInterface
{
    public function harvest()
    {
        return __CLASS__ . '产米' . PHP_EOL;
    }
    public function money()
    {
        return __CLASS__ . '卖米' . PHP_EOL;
    }
}
class PigFarm implements FarmInterface
{
    public function harvest()
    {
        return __CLASS__ . '产猪' . PHP_EOL;
    }
    public function money()
    {
        return __CLASS__ . '卖猪' . PHP_EOL;
    }
}

class PeonyZoo implements ZooInterface
{
    public function show()
    {
        return __CLASS__ . '牡丹展' . PHP_EOL;
    }
    public function money()
    {
        return __CLASS__ . '卖牡丹门票' . PHP_EOL;
    }
}
class PandaZoo implements ZooInterface
{
    public function show()
    {
        return __CLASS__ . '熊猫展' . PHP_EOL;
    }
    public function money()
    {
        return __CLASS__ . '卖熊猫门票' . PHP_EOL;
    }
}

// 植物生产线 包含一组产品
$plant = new PlantFactory();

// 动物生产线 包含一组产品
$animal = new AnimalFactory();

// 模拟调用， 抽象工厂模式核心是面向接口编程
$call = function (LivingFactory $factory) {
    $earn = function (Income $income) {
        return $income->money();
    };
    echo $earn($factory->createFarm());
    echo $earn($factory->createZoo());
};

$call($plant);
$call($animal);
