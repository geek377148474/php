<?php

declare(strict_types=1);

use Doctrine\Common\Collections\ArrayCollection;

/*
    collection methods 2~5
    Selectable methods 6
    Comparison 7
    Expressions Builder 8~12
    DerivedArrayCollection 13
*/

$collection = new ArrayCollection([1, 2, 3]);

$filteredCollection = $collection->filter(function ($count) {
    return $count > 1;
}); // [2, 3]

dump($filteredCollection);







