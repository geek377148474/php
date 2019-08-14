<?php

/**
 * 将选定的后半段输入的参数作为一个集合array
 *
 * @param [type] $abstracts
 * @param [type] $tags
 * @return void
 */
function getArgsAsArray($abstracts, $tags)
{
    echo 'this is a '.$abstracts.PHP_EOL;
    $tags = is_array($tags) ? $tags : array_slice(func_get_args(), 1);
    return $tags;
}

$args = getArgsAsArray('test', 'arg1', 'arg2', 'arg3');

dump($args);

function mydump($data){
    return sprintf('<pre>%s</pre>', print_r($data, true));
}

