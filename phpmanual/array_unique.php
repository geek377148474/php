<?php

/**
 * @array_unique
 * value相同的基元去掉
 */

$arr = [
    0=>'a',
    1=>'a',
];
dump(array_unique($arr));