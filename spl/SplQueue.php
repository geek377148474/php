<?php

$obj = new SplQueue();

$obj->enqueue('a');
$obj->enqueue('b');
$obj->enqueue('c');
dump($obj);

echo 'bottom:' . $obj->bottom() . PHP_EOL;

echo 'top:' . $obj->top() . PHP_EOL;
//队列里的offset=0是指向bottom位置，offset=1是top方向相连的节点
$obj->offsetSet(0, 'A');
dump($obj);
//队列里的rewind使得指针指向bottom所在位置的节点
$obj->rewind();
echo 'current : ' . $obj->current() . PHP_EOL;

while ($obj->valid()) {

    echo $obj->key() . '= > ' . $obj->current() . PHP_EOL;
    $obj->next(); //
}
//dequeue操作从队列中提取bottom位置的节点，并返回，同时从队列里面删除该元素
echo 'dequeue obj : ' . $obj->dequeue() . PHP_EOL;

dump($obj);
