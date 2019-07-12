<?php
require 'common/function.php';
$dir = '';// 工作目录
if (!empty($dir) && dirname($_SERVER['SCRIPT_FILENAME']) != $dir) {
    chdir($dir);
}

require 'example.php';
