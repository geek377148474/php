<?php
function daemonize()
{


    $pid = pcntl_fork();
    if ($pid == -1) {
        die("fork(1) failed!\n");
    } elseif ($pid > 0) {
        // 让由用户启动的进程退出
        exit(0);
    }

    // 建立一个有别于终端的新session以脱离终端
    posix_setsid();

    $pid = pcntl_fork();
    if ($pid == -1) {
        die("fork(2) failed!\n");
    } elseif ($pid > 0) {
        // 父进程退出, 剩下子进程成为最终的独立进程
        exit(0);
    }

    echo "Ctl + c or run cmd: Kill -SIGINT " . posix_getpid() . PHP_EOL;
    pcntl_signal(SIGINT, function () {
        exit('get signal SIGINT and exit' . PHP_EOL);
    });
}

daemonize();
sleep(1000);
