<?php

function get($num) {
    $arr = [];
    $columnArr = ['A', 'B', 'C', 'D', 'E'];
    $j = 0; // 代表格数
    $k = 1; // 行数
    for ($i = 1; $i <= $num; ) {
        if ($j != 0 && $j % 5 == 0) {
            $k++;
            $columnArr = array_reverse($columnArr);
        } else {
            $arr[][$columnArr[($j+5) % 5]] = $i;
            $i++;
        }
        $j++;
    }
    $column = array_keys(array_pop($arr))[0];
    $line = $k;
    return compact('column', 'line');
}
$num = 2013;
$arr = get($num);
dump($arr);