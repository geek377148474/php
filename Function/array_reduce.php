<?php

$arr = ['AAAA', 'BBBB', 'CCCC'];

$res = array_reduce($arr, function($carry, $item){
    return $carry . $item;
});

dump($res);


function fake_array_reduce($arr, $func, $initial=null)
    $temp = $initial;
    foreach($arr as $v) {
        $temp = $func($temp, $v);
    }
    return $temp;
}