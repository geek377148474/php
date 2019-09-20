<?php

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Criteria;

$collection = new ArrayCollection([
    [
        'foo' => 'value1',
        'bar' => '1',
    ],
    [
        'foo' => 'value2',
        'bar' => 1,
    ],
    [
        'foo' => null,
        'bar' => 2,
    ],
]);

// in
$expressionBuilder = Criteria::expr();
$expression = $expressionBuilder->in('foo', ['value1', 'value2']);
$matched = $collection->matching(new Criteria($expression));
dump($matched);

// notIn
$expressionBuilder = Criteria::expr();
$expression = $expressionBuilder->notIn('foo', ['value1', 'value2']);
$matched = $collection->matching(new Criteria($expression));
dump($matched);