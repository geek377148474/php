<?php

use Monolog\Formatter\LineFormatter;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

/*

// 定义时间格式为 "Y-m-d H:i:s"
$dateFormat = "Y n j, g:i a";
// 定义日志格式为 "[%datetime%] %channel%.%level_name%: %message% %context% %extra%\n"
$output = "%datetime%||%channel||%level_name%||%message%||%context%||%extra%\n";
// 根据 时间格式 和 日志格式，创建一个 Formatter
$formatter = new LineFormatter($output, $dateFormat);

*/

// create a log channel
$log = new Logger('name');

// 创建一个 StreamHandler
$stream = new StreamHandler('2.log', Logger::WARNING);

// 为 StreamHandler 添加修饰 LineFormatter
// 定义时间格式为 "Y-m-d H:i:s"
$dateFormat = "Y n j, g:i a";
// 定义日志格式为 "[%datetime%] %channel%.%level_name%: %message% %context% %extra%\n"
$output = "%datetime%||%channel||%level_name%||%message%||%context%||%extra%\n";
// 根据 时间格式 和 日志格式，创建一个 Formatter
$formatter = new LineFormatter($output, $dateFormat);
// 将 Formatter 设置到 Handler 里面
$stream->setFormatter($formatter);

// 将 Handler 推入到 Channel 的 Handler 队列内
$log->pushHandler($stream);

// log message
$log->warning('Foo');

// log context
$log->error('a new user', ['username' => 'daydaygo']);

// log extra
$log->pushProcessor(function ($record) {
    $record['extra']['hello'] = 'world';
    return $record;
});
$log->pushProcessor(new \Monolog\Processor\MemoryPeakUsageProcessor());
$log->alert('message', ['context0', 'context1'=>'context1']);





