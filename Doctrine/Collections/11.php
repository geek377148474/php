<?php

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Criteria;

$collection = new ArrayCollection([
    [
        'foo' => 'value1',
        'bar' => '1',
    ],
    [
        'foo' => 1,
        'bar' => 1,
    ],
    [
        'foo' => null,
        'bar' => 2,
    ],
    [
        'foo' => 'hello',
        'bar' => 2,
    ],
    [
        'foo' => 'world',
        'bar' => 2,
    ],
]);

// isnull
$expressionBuilder = Criteria::expr();
$expression = $expressionBuilder->isNull('foo');
$matched = $collection->matching(new Criteria($expression));
dump($matched);

// contains
$expressionBuilder = Criteria::expr();
$expression = $expressionBuilder->contains('foo', 'value1');
$matched = $collection->matching(new Criteria($expression));
dump($matched);

// memberOf
// $expressionBuilder = Criteria::expr();
// $expression = $expressionBuilder->memberOf('foo', ['value1', 'value2']);
// $matched = $collection->matching(new Criteria($expression));
// dump($matched);

$expressionBuilder = Criteria::expr();
$expression = $expressionBuilder->startsWith('foo', 'hello');
$matched = $collection->matching(new Criteria($expression));
dump($matched);

$expressionBuilder = Criteria::expr();
$expression = $expressionBuilder->endsWith('foo', 'world');
$matched = $collection->matching(new Criteria($expression));
dump($matched);

