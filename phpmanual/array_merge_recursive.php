<?php
$ar1 = [
    "color" => [
        "favorite" => "red"
    ],
    5
];
$ar2 = [
    10,
    "color" => [
        "favorite" => "green",
        "blue"
    ],
    11
];
$result = array_merge_recursive($ar1, $ar2);

echo sprintf('<pre>%s</pre>', print_r($result, true));


echo 'you can compare with array_merge:' . PHP_EOL;

$result = array_merge($ar1, $ar2);

echo sprintf('<pre>%s</pre>', print_r($result, true));

echo 'you can compare with array plus:' . PHP_EOL;

dump($ar1 + $ar2);
