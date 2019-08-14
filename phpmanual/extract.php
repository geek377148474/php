<?php

/* 假定 $var_array 是 wddx_deserialize 返回的数组*/

$size = "large";
$var_array = array("color" => "blue",
                   "size"  => "medium",
                   "shape" => "sphere");
extract($var_array, EXTR_PREFIX_SAME, "wddx");

dump("$color, $size, $shape, $wddx_size".PHP_EOL);
// blue, large, sphere, medium

/**
 * 以下结果为了验证 先后顺序还是类型决定 
 * 变量在EXTR_PREFIX_SAME下extract 
 * 哪一个会是 use prefix
 * 哪一个会是 not use prefix
 * 
 * But obviously, do no effect to 原来存在符号表的变量
 * 若想达成 可使用EXTR_IF_EXISTS作为第二参数
 * 
 * 若需要使用更多的way 可翻阅manual
 */
$var_array = array("color" => "blue",
                   "size"  => "medium",
                   "shape" => "sphere");
$size = "large";
extract($var_array, EXTR_PREFIX_SAME, "wddx");

dump("$color, $size, $shape, $wddx_size".PHP_EOL);
// blue, large, sphere, medium