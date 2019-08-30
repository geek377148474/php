<?php

use Swoole\Coroutine as co;

$chan = new co\channel(10);

/*
Coroutine\Channel->$capacity
构造函数中设定的容量会保存在此，不过如果设定的容量小于1则此变量会等于1
 */

echo '当前通道大小：'.$chan->capacity;