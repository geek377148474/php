<?php

use Inhere\Validate\Validation;

$crossover = [
    'message' => 'hello world!',
    'code' => 666666,
    // 'data' => 'ok.'
];

$rule = array(
    'data' => 'require'
);

$merge = function ($value, $key) {
    echo $key.':'.$value;
};

array_walk($rule, $merge);

dump($rule);

// Validation::check($crossover, $rule);