<?php

/** 确保这个函数只能运行在SHELL中 */
if (substr(php_sapi_name(), 0, 3) !== 'cli') {
    　　die("cli mode only");
}


//最大的子进程数量
$maxChildPro = 8;

//当前的子进程数量
$curChildPro = 0;

//当子进程退出时，会触发该函数,当前子进程数-1
function sig_handler($sig)
{
    global $curChildPro;
    switch ($sig) {
        case SIGCHLD:
            echo 'SIGCHLD', PHP_EOL;
            $curChildPro--;
            break;
    }
}

//配合pcntl_signal使用，简单的说，是为了让系统产生时间云，让信号捕捉函数能够捕捉到信号量
declare(ticks=1);

//注册子进程退出时调用的函数。SIGCHLD：在一个进程终止或者停止时，将SIGCHLD信号发送给其父进程。
pcntl_signal(SIGCHLD, "sig_handler");

while (true) {
    $curChildPro++;
    $pid = pcntl_fork();
    if ($pid) {
        //父进程运行代码,达到上限时父进程阻塞等待任一子进程退出后while循环继续
        if ($curChildPro >= $maxChildPro) {
            pcntl_wait($status);
        }
    } else {
        $id = getmypid();
        //子进程运行代码
        $s = rand(2, 6);
        sleep($s);
        echo "process id $id child sleep $s second quit", PHP_EOL;
        exit;
    }
}
