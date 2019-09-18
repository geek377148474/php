<?php

use Inhere\Validate\Validation;

// https://github.com/inhere/php-validate

$crossover = [
    'message' => 'hello world',
    'code' => 666666,
    'data' => 'ok.'
];

$v = Validation::check($crossover,[
    // add rule
    ['message', 'min', 12, "msg" => "{attr} error msg!"], // 最短得多少
    ['code', 'number'], // 类型
    ['code', 'required'],
    ['data', 'required'],
]);

if ($v->isFail()) {
    var_dump($v->getErrors());
    var_dump($v->firstError());
}else{
    echo 'no error';
}

