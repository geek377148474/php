<?php

declare(strict_types=1);

require 'common/function.php';


// createRange
$arr = function ($a) {
    if ($a == 'createRange')
        return function ($start, $len): object {
            $array = new ArrayObject();
            for ($i = $start; $i < $len; $i++) {
                $array[$i] = $i;
            }
            return $array;
        };
    return 'this function is not found';
};
$createRange = $arr('createRange');
// $range = $createRange(0, 1000);


# [二分查找]
// require 'math/bin_sch.php';

# [顺序查找]
// require 'math/seq_sch.php';

# [线性表中的删除]
// require 'math/delete_array_element.php';

# [冒泡排序]
// require 'math/bubble_sort.php';

# [快速排序]
// require 'math/quick_sort.php';
