<?php

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
