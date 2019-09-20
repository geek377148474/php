<?php

use Doctrine\Common\Collections\ArrayCollection as Collection;
/*
    改变型
*/

// clear
$collection->clear();
dump($collection);

// add
$collection->add('test');
dump($collection);

// filter
$collection = new Collection([1, 2, 3]);
$filteredCollection = $collection->filter(function($count) {
    return $count > 1;
}); // [2, 3]

// map
$collection = new Collection([1, 2, 3]);
$mappedCollection = $collection->map(function($value) {
    return $value + 1;
}); // [2, 3, 4]

// partition
$collection = new Collection([1, 2, 3]);
$mappedCollection = $collection->partition(function($key, $value) {
    return $value > 1;
}); // [[2, 3], [1]]

// remove
$collection = new Collection([1, 2, 3]);
$collection->remove(0); // [2, 3]

// removeElement
$collection = new Collection([1, 2, 3]);
$collection->removeElement(3); // [1, 2]

// set
$collection = new Collection();
$collection->set('name', 'jwage');

// slice
$collection = new Collection([0, 1, 2, 3, 4, 5]);
$slice = $collection->slice(1, 2); // [1, 2]

// toArray
$collection = new Collection([0, 1, 2, 3, 4, 5]);
$array = $collection->toArray(); // [0, 1, 2, 3, 4, 5]
