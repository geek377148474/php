<?php

/**
 * 入口文件
 */

if ($argc>0) {
    if ($argv[1] === '-t'){
        define('TRACE', true);
    }
}

!defined('DEBUG') && define('DEBUG', true);
!defined('TRACE') && define('TRACE', false);
!defined('WORK_DIR') && define('WORK_DIR', __DIR__);

require 'vendor/autoload.php';

if (DEBUG) {
    ini_set('display_error', 'On');
    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();
} else {
    ini_set('display_errors', 'Off');
}

$dir = 'annotation'; // 工作目录
if (!empty($dir) && dirname($_SERVER['SCRIPT_FILENAME']) != $dir) {
    chdir($dir);
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
    echo 'PHP '.phpversion().' ('.$threadSafeFlag.')'.PHP_EOL;
    if (phpversion('trace') !== false){
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
        fgets($fp);
        fclose($fp);
        usleep(100000);
    }else{
        echo 'please install phptrace';
    }
    exit;
}
###########################################

require 'bootstrap.php';
