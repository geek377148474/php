<?php

$array_a = new ArrayIterator(array('a', 'b', 'c', 'd'));

$array_b = new ArrayIterator(array('e', 'f', 'e', 'g'));

$it = new AppendIterator();
$it->Append($array_a);
//通过append方法把迭代器对象添加到AppendIterator对象中
$it->append($array_b);
foreach ($it as $key => $value) {
    # code...
    echo $value . PHP_EOL;
}
