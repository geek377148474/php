<?php
namespace Container;

require 'Container.php';
/**
 * [IOC 服务容器]
 */
// $Container = new Container();
// $Container->bind('SomethingA', function(){
//     return new SomethingA();
// });
// $Container->bind('SomethingB', function(){
//     return new SomethingB();
// });
// $Container->bind('Me', function ($container, $module) {
//     return new Me($container->make($module));
// });
//
// $A = $Container->make('Me', 'SomethingA');
// $B = $Container->make('Me', 'SomethingB');
//
// dump($A);
// dump($B);

/**
 * [IOC 服务容器 利用反射实现自动搜寻依赖]
 */
$sc = new SuperContainer();
$sc->make(You::class);