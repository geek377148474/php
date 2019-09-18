<?php
/*
@Iterator, Countable
SplPriorityQueue实现了Iterator, Countable接口
所以我们可以foreach/count函数操作它
或者使用rewind,valid,current,next/count方法

堆实现
所以rewind方法是一个no-op没有什作用的操作
因为头指针始终指向堆顶
即current始终等于top
不像List只是游走指针
出队是会删除堆元素的
extract = current + next（current出队，从堆中删除）




*/


$splPriorityQueue = new \SplPriorityQueue();

$splPriorityQueue->insert("task1", 1);
$splPriorityQueue->insert("task2", 2);
$splPriorityQueue->insert("task3", 1);
$splPriorityQueue->insert("task4", 4);
$splPriorityQueue->insert("task5", 5);

echo "Countable： " . count($splPriorityQueue) . PHP_EOL;

// 迭代的话会删除队列元素 current 指针始终指向 top 所以 rewind 没什么意义
for ($splPriorityQueue->rewind(); $splPriorityQueue->valid(); $splPriorityQueue->next()) {
    var_dump($splPriorityQueue->current());
    var_dump($splPriorityQueue->count());
    $splPriorityQueue->rewind();
}

var_dump("is empty:" . $splPriorityQueue->isEmpty());