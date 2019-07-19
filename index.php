<?php
/**
 * 入口文件
 */

!defined('DEBUG') && define('DEBUG', true);

 require 'vendor/autoload.php';

 if (DEBUG) {
    ini_set('display_error', 'On');
    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();
 }else{
     ini_set('display_errors', 'Off');
 }

$dir = 'annotation';// 工作目录
if (!empty($dir) && dirname($_SERVER['SCRIPT_FILENAME']) != $dir) {
    chdir($dir);
}

require 'bootstrap.php';