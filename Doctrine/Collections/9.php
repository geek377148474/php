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
// andX
$expressionBuilder = Criteria::expr();
$expression = $expressionBuilder->andX(
    $expressionBuilder->eq('foo', 1),
    $expressionBuilder->eq('bar', 1)
);
$matched = $collection->matching(new Criteria($expression));
dump($matched);
/*
ArrayCollection {#20 ▼
    -elements: array:1 [▼
    3 => array:2 [▼
      "foo" => 1
      "bar" => 1
    ]
  ]
}
*/

// orX
$expressionBuilder = Criteria::expr();
$expression = $expressionBuilder->orX(
    $expressionBuilder->eq('foo', 1),
    $expressionBuilder->eq('bar', 1)
);
$matched = $collection->matching(new Criteria($expression));
dump($matched);
/*
ArrayCollection {#22 ▼
    -elements: array:2 [▼
    3 => array:2 [▼
      "foo" => 1
      "bar" => 1
    ]
    4 => array:2 [▼
      "foo" => 1
      "bar" => 2
    ]
  ]
}
*/

