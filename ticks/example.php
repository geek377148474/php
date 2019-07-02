<?php

pcntl_signal(SIGINT, function () {
    exit('get signal SIGINT and exit' . PHP_EOL);
});
echo "Ctl + c or run cmd: Kill -SIGINT " . posix_getpid() . PHP_EOL;

declare(ticks=1);
register_tick_function(function () {
    echo 'function is called '  . PHP_EOL;
});

while (1) {
    sleep(1);
};
