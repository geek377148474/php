<?php

function quick_sort($array): array
{
    $count = count($array);
    if ($count <= 1) return $array;
    $leftArr = [];
    $rightArr = [];
    $key = $array[0];
    for ($i = 1; $i < $count; $i++) {
        $compare =  $array[$i] <=> $key;
        if ($compare == -1) {
            $leftArr[] = $array[$i];
        } elseif ($compare == 1) {
            $rightArr[] = $array[$i];
        }
    }
    $leftArr = quick_sort($leftArr);
    $rightArr = quick_sort($rightArr);
    return array_merge($leftArr, [$key], $rightArr);
}

$range = range(0, 20);
shuffle($range);
dump($range);
$range = quick_sort($range);
dump($range);
