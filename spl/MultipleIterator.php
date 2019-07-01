<?php
ini_set('display_errors', '1');
error_reporting(E_ALL);
$id_iter = new ArrayIterator(array('01', '02', '03'));

$name_iter = new ArrayIterator(array('张三', '李四', '王五'));

$age_iter = new ArrayIterator(array('21', '22', '23'));

$mit = new MultipleIterator(MultipleIterator::MIT_KEYS_ASSOC);

$mit->attachIterator($id_iter, 'ID');

$mit->attachIterator($name_iter, 'name');
$mit->attachIterator($age_iter, 'age');

foreach ($mit as $key => $value) {
    # code...
    dump($value);
}
