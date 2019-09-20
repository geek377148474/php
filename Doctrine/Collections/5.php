<?php

use Doctrine\Common\Collections\ArrayCollection as Collection;
/*
    状态型
*/

// current
$collection = new Collection(['first', 'second', 'third']);
$current = $collection->current(); // first
dump($current);

// first
$collection = new Collection(['first', 'second', 'third']);
$first = $collection->first(); // first
dump($first);

// key
$collection = new Collection([1, 2, 3]);
$collection->next();
$key = $collection->key(); // 1

// last
$collection = new Collection([1, 2, 3]);
$last = $collection->last(); // 3

// next
$collection = new Collection([1, 2, 3]);
$next = $collection->next(); // 2