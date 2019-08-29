<?php

$prefix = 'index.php';

if (DIRECTORY_SEPARATOR !== $_SERVER['REQUEST_URI'] && $file = str_replace(DIRECTORY_SEPARATOR.$prefix, '', $_SERVER['REQUEST_URI']))
    require WORK_DIR . $file;
else{
    $files = getDirFiles(__DIR__, 'bootstrap.php');
    print fileToHerf($files, $prefix);
}
// echo sprintf('<pre>%s</pre>', print_r($data, true));
