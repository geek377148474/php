<?php

/**
 * @url https://github.com/Seldaek/monolog
 */

use Monolog\Logger;
use Monolog\Handler\StreamHandler;



// create a log channel
$log = new Logger('name');
$log->pushHandler(new StreamHandler('1.log', Logger::WARNING));

// add records to the log
$log->warning('Foo');
$log->error('Bar');
$log->alert('czl');