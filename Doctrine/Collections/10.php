<?php

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Criteria;

$collection = new ArrayCollection([
    [
        'foo' => '1',
        'bar' => '1',
    ],
    [
        'foo' => 1,
        'bar' => 1,
    ],
    [
        'foo' => 1,
        'bar' => 2,
    ],
]);

// eq
$expressionBuilder = Criteria::expr();
$expression = $expressionBuilder->eq('bar', 2);
$matched = $collection->matching(new Criteria($expression));
dump($matched);
/*
ArrayCollection {#15 ▼
    -elements: array:1 [▼
    4 => array:2 [▼
      "foo" => 1
      "bar" => 2
    ]
  ]
}
*/

// gt
$expressionBuilder = Criteria::expr();
$expression = $expressionBuilder->gt('foo', 1);
$matched = $collection->matching(new Criteria($expression));
dump($matched);
/*
ArrayCollection {#18 ▼
    -elements: array:1 [▼
    1 => array:2 [▼
      "foo" => "2"
      "bar" => "1"
    ]
  ]
}
*/

// lt
$expressionBuilder = Criteria::expr();
$expression = $expressionBuilder->lt('foo', 1);
$matched = $collection->matching(new Criteria($expression));
dump($matched);

// gte

// lte

// neq