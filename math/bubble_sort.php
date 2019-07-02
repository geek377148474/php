<?php

function bubble_sort($array): array
{
    $count = count($array);
    if ($count <= 1) {
        return $array;
    }
    for ($i = 0; $i < $count; $i++) {
        for ($j = $count - 1; $j > $i; $j--) {
            if ($array[$j] < $array[$j - 1]) {
                $tmp = $array[$j];
                $array[$j] = $array[$j - 1];
                $array[$j - 1] = $tmp;
            }
        }
    }
    return $array;
}

$range = range(0, 20);
shuffle($range);
dump($range);
$range = bubble_sort($range);
dump($range);
