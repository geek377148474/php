<?php
//二分查找（数组里查找某个元素）  
function bin_sch($array,  $begin, $end, $search)
{
    if ($begin <= $end) {
        $mid =  intval(($begin + $end) / 2);
        if ($array[$mid] ==  $search) {
            return $mid;
        } elseif ($search < $array[$mid]) {
            return  bin_sch($array, $begin,  $mid - 1, $search);
        } else {
            return  bin_sch($array, $mid + 1, $end, $search);
        }
    }
    return -1;
}

$range = (array) $createRange(0, 1000);
$searchValue = 200;
echo "值是{$searchValue}的节点的searchey是：" . bin_sch($range, 1000, 2000, $searchValue);
