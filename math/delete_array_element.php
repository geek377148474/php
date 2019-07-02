<?php
//线性表的删除（数组中实现）  
function delete_array_element(array $array, int $i): array
{
    $len =  count($array);
    for ($j = $i; $j < $len; $j++) {
        $array[$j] = $array[$j + 1];
    }
    array_pop($array);
    return $array;
}

$range = $createRange(0, 100);
$newRange = delete_array_element((array) $range, 50);
dump($newRange);
