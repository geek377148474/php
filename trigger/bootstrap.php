<?php

// Array representing a possible record set returned from a database
$records = array(
    array(
        'id' => 2135,
        'first_name' => 'John',
        'last_name' => 'Doe',
    ),
    array(
        'id' => 3245,
        'first_name' => 'Sally',
        'last_name' => 'Smith',
    ),
    array(
        'id' => 5342,
        'first_name' => 'Jane',
        'last_name' => 'Jones',
    ),
    array(
        'id' => 5623,
        'first_name' => 'Peter',
        'last_name' => 'Doe',
    )
);
 
$arr = array_column($records, 'first_name', 'last_name');
var_dump($arr);
die;

$prefix = 'index.php';

$uri = rtrim($_SERVER['REQUEST_URI'], DIRECTORY_SEPARATOR);
if ($file = str_replace(DIRECTORY_SEPARATOR . $prefix, '', $uri))
    require WORK_DIR . $file;
else {
    $files = getDirFiles(__DIR__, 'bootstrap.php');
    if (empty($files)) {
        throw new \Exception('no files in ' . WORK_DIR);
    }
    print fileToHerf($files, $prefix);
}
// echo sprintf('<pre>%s</pre>', print_r($data, true));
