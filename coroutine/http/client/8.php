<?php

use Swoole\Coroutine as Co;

Co::create(function(){
    $host = 'www.swoole.com';
    $cli = new \Swoole\Coroutine\Http\Client($host, 443, true);
    $cli->set(['timeout' => -1]);
    $cli->setHeaders([
        'Host' => $host,
        "User-Agent" => 'Chrome/49.0.2587.3',
        'Accept' => '*',
        'Accept-Encoding' => 'gzip'
    ]);

/*
    Coroutine\Http\Client->download
    通过Http下载文件。download与get方法的不同是download收到数据后会写入到磁盘，而不是在内存中对Http Body进行拼接。因此download仅使用小量内存，就可以完成超大文件的下载。 函数原型：

    function Coroutine\Http\Client->download(string $path, string $filename,  int $offset = 0);
    $path URL路径
    $filename 指定下载内容写入的文件路径，会自动写入到downloadFile属性
    $offset 指定写入文件的偏移量，此选项可用于支持断点续传，可配合Http头Range:bytes=$offset-实现
    $offset为0时若文件已存在，底层会自动清空此文件
    执行成功返回true
    打开文件失败或feek失败返回false
*/

    $cli->download('/static/files/swoole-logo.svg', __DIR__ . '/logo.svg');
});
