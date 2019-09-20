<?php

use Doctrine\Common\Collections\ArrayCollection as Collection;

/*
    key-value 相关
*/

// get
$collection = new Collection([
    'key' => 'value',
]);
$value = $collection->get('key'); // value
dump($value);

// getKeys
$collection = new Collection(['a', 'b', 'c']);
$keys = $collection->getKeys(); // [0, 1, 2]
dump($keys);

// getValues
$collection = new Collection([
    'key1' => 'value1',
    'key2' => 'value2',
    'key3' => 'value3',
]);
$values = $collection->getValues(); // ['value1', 'value2', 'value3']

// indexOf
$collection = new Collection([1, 2, 3]);
$indexOf = $collection->indexOf(3); // 2