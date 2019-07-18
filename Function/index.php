<?php
require 'common/function.php';
$dir = 'extract';// 工作目录
if (!empty($dir) && dirname($_SERVER['SCRIPT_FILENAME']) != $dir) {
    chdir($dir);
}

# [extract] 从数组中将变量导入到当前的符号表
// require 'extract.php';

