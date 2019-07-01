<?php

date_default_timezone_set('PRC');

$file = new SplFileInfo('tmp.txt');

echo 'file is created at ' . date('Y-m-d H:i:s', $file->getCTime()) . PHP_EOL;

echo 'file is modifyed at ' . date('Y-m-d H:i:s', $file->getMTime()) . PHP_EOL;

echo 'file size is ' . $file->getSize() . 'bytes' . PHP_EOL;

//读取文件里的内容
$fileObj = $file->openFile('r');

while ($fileObj->valid()) {
    # code...
    echo $fileObj->fgets();
}
//销毁对象
$fileObj = null;
$file = null;
