<?php

declare(strict_types=1);

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Criteria;
use Doctrine\Common\Collections\Expr\Comparison;

/*
    selectable methods
*/

$collection = new ArrayCollection([
    [
        'name' => 'jwage',
    ],
    [
        'name' => 'romanb',
    ],
]);

$expr = new Comparison('name', '=', 'jwage');
dump($expr);

$criteria = new Criteria();
$criteria->where($expr);
dump($criteria);

$matched = $collection->matching($criteria); // ['jwage']
dump($matched);
