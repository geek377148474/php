<?php
echo phpinfo();
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
