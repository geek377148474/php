<?php
$dir = 'pcntl';

if (strpos(__DIR__, $dir) !== false) {
    $dir = '';
} else {
    $dir .= DIRECTORY_SEPARATOR;
}

#============================== pcntl ==========================#

// require 'pcntl/pcntl.php';
# [php_sapi_name] 检测PHP运行环境 相当于 PHP_SAPI


# [pcntl_signal]


# [pcntl_fork] 创建子进程
require $dir . 'pcntl_fork.php';

# [pcntl_wait] 父进程等待子进程退出


# [pcntl_waitpid] 返回退出的子进程进程号


# [getmypid] 获取进程号

# [declare]
