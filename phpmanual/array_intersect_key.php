<?php
/**
 * @array_intersect_key
 * Computes the intersection of arrays using keys for comparison
 * 返回在第一个数组中 第二个数组也有的 具有同个key的基元
 */
$array1 = ['blue'  => 1, 'red'  => 2, 'green'  => 3, 'purple' => 4];
$array2 = ['green' => 5, 'blue' => 6, 'yellow' => 7, 'cyan'   => 8];

dump(array_intersect_key($array1, $array2));