<?php

function arraySum(array $nums) {
    $sum = 0;
    foreach ($nums as $n) {
        $sum += $n;
    }
    return $sum;
}
assert(arraySum([1, 2, 3]) == 6, 'arraySum() 测试不通过:');
assert(is_numeric(arraySum([1, 2, 3])), 'arraySum() 测试不通过:');