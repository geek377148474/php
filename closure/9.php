<?php

$test = function($closure,$a,$b){
    return $closure($a,$b);
};
$test(function($a, $b){
    echo $a . $b . PHP_EOL;
},1,2);