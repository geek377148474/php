<?php
$arr = function ($a) {
    if ($a == 'createRange')
        return function ($start, $len) use ($a): object {
            $array = new ArrayObject();
            for ($i = $start; $i < $len; $i++) {
                $array[$i + 1000] = $i;
            }
            return $array;
        };
    return 'this function is not found';
};
$createRange = $arr('createRange');
$range = $createRange(0, 1000);
