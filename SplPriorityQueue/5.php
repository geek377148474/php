<?php
$splPriorityQueue = new \SplPriorityQueue();

$splPriorityQueue->insert("task1", 1);
$splPriorityQueue->insert("task2", 1);
$splPriorityQueue->insert("task3", 1);
$splPriorityQueue->insert("task4", 1);
$splPriorityQueue->insert("task5", 1);

foreach ($splPriorityQueue as $value) {
    echo $value . PHP_EOL;
}