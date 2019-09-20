<?php

use Doctrine\Common\Collections\ArrayCollection as Collection;

/*
    判断型
*/

// contains
$contains = $collection->contains('test'); // true
dump($contains);

// containsKey
$collection = new Collection(['test'=>true]);
dump($collection);
$collection->containsKey('test'); // true

// isEmpty
$collection = new Collection(['a', 'b', 'c']);
$isEmpty = $collection->isEmpty(); // false

// exists
$collection = new Collection(['first', 'second', 'third']);
$exists = $collection->exists(function($key, $value) {
    return $value === 'first';
}); // true

// forAll
$collection = new Collection([1, 2, 3]);
$forAll = $collection->forAll(function($key, $value) {
    return $value > 1;
}); // false