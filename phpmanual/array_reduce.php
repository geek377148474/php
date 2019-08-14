<?php

$arr = ['AAAA', 'BBBB', 'CCCC'];

$res = array_reduce($arr, function ($carry, $item) {
    return $carry . $item;
});

var_dump($res);

function fake_array_reduce($arr, $func, $initial = null)
{
    $temp = $initial;
    foreach ($arr as $v) {
        $temp = $func($temp, $v);
    }
    return $temp;
}

// 当不使用$i去修正$func第一个参数$initial的null的相乘影响
// 那么结果将会是0
$arr = [1, 2, 3];
$i = 0;
$res = array_reduce($arr, function ($carry, $item) use (&$i) {
    if ($i == 0) {
        $i++;
        return 1;
    }
    return $carry * $item;
});
