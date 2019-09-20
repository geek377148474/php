<?php

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Criteria;

/*
    Expressions Builder
*/

$array = [
    [
        'name' => 'jwage',
    ],
    [
        'name' => 'romanb',
    ],
];
$collection = new ArrayCollection($array);
$expressionBuilder = Criteria::expr();

$criteria = new Criteria();
$criteria->where($expressionBuilder->eq('name', 'jwage'));
$criteria->orWhere($expressionBuilder->eq('name', 'romanb'));

$matched = $collection->matching($criteria);
dump($matched);