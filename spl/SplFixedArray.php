<?php

function createFixedArray()
{
    $args = func_get_arg(0);
    $array = new SplFixedArray($args[0]);

    if (isset($args[1])) {
        $newArgs = array_splice($args, 1);
        dump($newArgs);
        for ($i = 0; $i < $args[0]; $i++) {
            $array[$i] = createFixedArray($newArgs);
        }
    }
    return $array;
}
$fixedArray = createFixedArray(array(2, 2, 2));

$fixedArray[0][0][0] = 0;
$fixedArray[0][0][1] = 1;

$fixedArray[0][1][0] = 1;
$fixedArray[0][1][1] = 0;

$fixedArray[1][0][0] = 1;
$fixedArray[1][0][1] = 0;

$fixedArray[1][1][0] = 0;
$fixedArray[1][1][1] = 1;

$fixedArray[1][1][0] = 0;
$fixedArray[1][1][1] = 1;

dump($fixedArray);
