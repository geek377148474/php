<?php

// include_once __DIR__."/plugin.php";

interface Plugin{
    function showMenu();
}
class MyPlugin implements Plugin{

    function showMenu()
    {
        $menu = array(
            array(
                'name' => 'menu1', 'link' => 'index.php?act=link1'
            ),
            array(
                'name' => 'menu2', 'link' => 'index.php?act=link2'
            )
        );
        return $menu;
    }
}

function get_plugin_menus(){
    $menus = array();
    $all_class = get_declared_classes();//获取所有的类
    foreach ($all_class as $cls){
        $ref_cls = new ReflectionClass($cls);
        if ($ref_cls->implementsInterface('Plugin')){//是否实现了某个接口
            if ($ref_cls->hasMethod('showMenu')){
                $method = $ref_cls->getMethod("showMenu");
                if ($method->isStatic()){
                    $method->invoke(null);
                }else{
                    // $method->invoke(new $cls());//这样获取类
                    $instance = $ref_cls->newInstance();
                    $menu = $method->invoke($instance);
                    $menus = array_merge($menus,$menu);

                }
            }
        }
    }
    return $menus;
}
$menus = get_plugin_menus();
dump($menus);
