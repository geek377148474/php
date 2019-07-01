<?php
//显示当前目录下的所有文件、大小、创建时间

$it = new FileSystemIterator('.');
date_default_timezone_set('PRC');
foreach ($it as $key => $file_info) {
    dump($file_info);
    # code...
    // printf(
    //     '%s|%s|%8s|%s\n',
    //     date('Y-m-d H:i:s', $file_info->getMTime()),
    //     $file_info->isDir() ? "<dir>" : '',
    //     number_format($file_info->getsize()),
    //     $file_info->getFileName()
    // );
}
