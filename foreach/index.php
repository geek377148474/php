<?php
require 'common/function.php';

# [foreach的迭代引用] 每次遍历相当于 $v = $arr[$key]
/*
foreach每次操作一个单元，
都是将其索引和值分别取到变量中，
或者只取出值到一个变量中，
然后单独操作放有索引和值的变量，
不会影响到被遍历的对象本身。
如果要在遍历过程中修改对象中的值，
需要在声明是在变量前加&符号。
例如：foreach($array as &$value）。
*/
require 'foreach/example.php';
