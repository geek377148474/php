<?php

/**
 * 可设置多个循环 或多次调用的 程序中 选定条件 $condition 终止
 * 当然 $condition 可以是表达式 也可以是 调用的闭包(该闭包需要被调用并返回用于判断)
 */
$chooseDump = function($condition, $data='dump your data here'){
    if ($condition) {
        \Doctrine\Common\Util\Debug::dump($data, 3);
        die;
    }
};

// $data = 'run in '.__CLASS__.'@'.__FUNCTION__