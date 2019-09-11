<?php

use Monolog\Formatter\LineFormatter;
use Monolog\Handler\FirePHPHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

// 创建一个 Channel，参数 log 即为 Channel 的名字
$log = new Logger('log');

// 创建两个 Handler，对应变量 $stream 和 $fire
$stream = new StreamHandler('test.log', Logger::WARNING);
$fire = new FirePHPHandler();

// 定义时间格式为 "Y-m-d H:i:s"
$dateFormat = "Y n j, g:i a";
// 定义日志格式为 "[%datetime%] %channel%.%level_name%: %message% %context% %extra%\n"
$output = "%datetime%||%channel||%level_name%||%message%||%context%||%extra%\n";
// 根据 时间格式 和 日志格式，创建一个 Formatter
$formatter = new LineFormatter($output, $dateFormat);

// 将 Formatter 设置到 Handler 里面
$stream->setFormatter($formatter);

// 讲 Handler 推入到 Channel 的 Handler 队列内
$log->pushHandler($stream);
$log->pushHandler($fire);

// clone new log channel
$log2 = $log->withName('log2');

// add records to the log
$log->warning('Foo');

// add extra data to record
// 1. log context
$log->error('a new user', ['username' => 'daydaygo']);
// 2. processor
$log->pushProcessor(function ($record) {
    $record['extra']['dummy'] = 'hello';
    return $record;
});
$log->pushProcessor(new \Monolog\Processor\MemoryPeakUsageProcessor());
$log->alert('czl');
