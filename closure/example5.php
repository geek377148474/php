<?php
// require 'common/function.php';
$dir = '';// 工作目录
if (!empty($dir) && dirname($_SERVER['SCRIPT_FILENAME']) != $dir) {
    chdir($dir);
}

// require 'example.php';

$closure = function(){
    $a = 1;
    return function($a){
        dump($this);
        echo $a;
    };
};

var_dump($closure instanceof Closure); // true


$a = $closure();

$a(3); // 3


