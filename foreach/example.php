<?php


$array = str_split("abcde");
foreach ($array as &$item)
    echo $item;

// dump($array);

// echo PHP_EOL;
foreach ($array as $item) {
    dump($array);
    echo $item;
}



die;



$array = str_split("abcde");
foreach ($array as &$item)
    echo $item;

echo PHP_EOL;
foreach ($array as $item)
    echo $item;


die;



$data = ['a', 'b', 'c'];

foreach ($data as $key => $val) {
    $val = &$data[$key];
}

dump($data);
