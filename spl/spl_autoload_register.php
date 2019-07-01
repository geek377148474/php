<?php

/**
 * libs/Test.class.php
 */
class Test
{

    public function __construct()
    {
        # code...
        echo 'loading class libs/Test.class.php\n';
    }
}

/**
 * autoload.php
 */
//设置autoload寻找php定义的类文件的扩展名，多个扩展名用逗号分隔，前面的扩展名优先匹配
spl_autoload_extensions('.class.php, .php');
//设置autoload寻找PHP定义的类文件的目录，多个目录用PATH_SEPARATOR进行分隔
set_include_path(get_include_path() . PATH_SEPARATOR . 'libs/');
set_include_path(__DIR__ . PATH_SEPARATOR . 'libs/');
//提示PHP使用autoload机制查找类定义
spl_autoload_register();
new Test();
