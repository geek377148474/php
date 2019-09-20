<?php

use Doctrine\Common\Collections\Criteria;
use Doctrine\Common\Collections\Expr\Comparison;

/*
    Expressions Expression
*/

$criteria = new Criteria();

// where
$expr = new Comparison('key', Comparison::EQ, 'value');
$criteria->where($expr);

// andWhere
$expr = new Comparison('key', Comparison::EQ, 'value');
$criteria->andWhere($expr);

// orWhere
$expr1 = new Comparison('key', Comparison::EQ, 'value1');
$expr2 = new Comparison('key', Comparison::EQ, 'value2');
$criteria->where($expr1);
$criteria->orWhere($expr2);

// orderBy
$criteria->orderBy(['name' => Criteria::ASC]);


/*
    Expressions Result
*/

// setFirstResult
$criteria->setFirstResult(0);

// getFirstResult
$criteria->setFirstResult(10);
echo $criteria->getFirstResult(); // 10

// setMaxResults
$criteria->setMaxResults(20);

// getMaxResults
$criteria->setMaxResults(20);
echo $criteria->getMaxResults(); // 20