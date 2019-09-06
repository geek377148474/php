<?php
/*
extract 出队更为友好
即始终返回优先级最高的元素
优先级相投时会以堆调整的特性返回数据



*/

$splPriorityQueue = new \SplPriorityQueue();

// data  priority
$splPriorityQueue->insert("task1", 1);
$splPriorityQueue->insert("task2", 2);
$splPriorityQueue->insert("task3", 1);
$splPriorityQueue->insert("task4", 4);
$splPriorityQueue->insert("task5", 5);

echo "Countable： " . count($splPriorityQueue) . PHP_EOL;

while (!$splPriorityQueue->isEmpty()) {
    var_dump($splPriorityQueue->extract());
    echo $splPriorityQueue->count() . PHP_EOL;
}