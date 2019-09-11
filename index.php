<?php

/**
 * 入口文件
 */

if ($argc > 0) {
    if ($argv[1] === '-t') {
        define('TRACE', true);
    }
}

date_default_timezone_set('Asia/Shanghai');

!defined('DEBUG') && define('DEBUG', true);
!defined('TRACE') && define('TRACE', false);
!defined('APP_DIR') && define('APP_DIR', __DIR__);

require 'vendor/autoload.php';

if (DEBUG) {
    ini_set('display_errors', 'On');
    ini_set('display_startup_errors', 'On');
    error_reporting(E_ALL);

    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();
} else {
    ini_set('display_errors', 'Off');
}

// TODO : 获取工作目录列表
// $dir = 'coroutine';
// $dir = 'phpmanual';
// $dir = 'rpc';
// $dir = 'SplPriorityQueue';
// $dir = 'Monolog';
$dir = 'Php-validate';

if (!empty($dir) && dirname($_SERVER['SCRIPT_FILENAME']) != $dir) {
    chdir($dir);
    defined('WORK_DIR') || define('WORK_DIR', __DIR__.DIRECTORY_SEPARATOR.$dir);
}

#########################################
if (TRACE) {
    /*
    |--------------------------------------------------------------------------
    | PHP trace start
    |--------------------------------------------------------------------------
    |
    */
    ob_start();
    phpinfo();
    $content = ob_get_contents();
    ob_end_clean();
    preg_match('@Thread Safety.*@', $content, $matches);
    $disabledPos = strpos($matches[0], 'disabled');
    $threadSafeFlag = $disabledPos !== false ? 'NTS' : 'ZTS';
    echo 'PHP ' . phpversion() . ' (' . $threadSafeFlag . ')' . PHP_EOL;
    if (phpversion('trace') !== false) {
        $pid = getmypid();
        echo "**phptrace sample**\n";
        echo "Type these command in a new console:\n";
        echo "\n";
        echo "trace:                    phptrace -p $pid\n";
        echo "trace with filter:        phptrace -p $pid -f type=function,content=sleep\n";
        echo "trace with filter:        phptrace -p $pid -f type=class,content=Me\n";
        echo "trace with count limit:   phptrace -p $pid -l 2\n";
        echo "view status:              phptrace status -p $pid\n";
        echo "view status by ptrace:    phptrace status -p $pid --ptrace\n";
        echo "\n";
        printf("Press enter to continue...\n");
        $fp = fopen('php://stdin', 'r');
        $buffers = fgets($fp);
        fclose($fp);
        usleep(100000);
    } else {
        echo 'please install phptrace' . PHP_EOL;
        exit;
    }
}
###########################################
require 'bootstrap.php';
