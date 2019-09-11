<?php

use Inhere\Validate\Validation;

$crossover = [
    'message' => 'hello world!',
    'code' => 666666,
    'data' => 'ok.'
];

$v = Validation::check($crossover,[
    // add rule
    ['message', 'min', 12], // 最短得多少
    ['code', 'number'], // 类型
    ['code', 'required'],
    ['data', 'required'],
]);

if ($v->isFail()) {
    var_dump($v->getErrors());
    var_dump($v->firstError());
}