<?php
/*
@重写compare方法定义自己的优先级处理机制。


*/

class CustomedSplPriorityQueue extends SplPriorityQueue
{
    /**
     * @param mixed $priority1
     * @param mixed $priority2
     * @return int
     */
    public function compare($priority1, $priority2): int
    {
        // return $priority1 - $priority2;//高优先级优先
        return $priority2 - $priority1;//低优先级优先
    }
}

$splPriorityQueue = new \CustomedSplPriorityQueue();
$splPriorityQueue->setExtractFlags(SplPriorityQueue::EXTR_BOTH);
$splPriorityQueue->insert("task1", 1);
$splPriorityQueue->insert("task2", 2);
$splPriorityQueue->insert("task3", 1);
$splPriorityQueue->insert("task4", 4);
$splPriorityQueue->insert("task5", 5);

echo "Countable： " . count($splPriorityQueue) . PHP_EOL;

while (!$splPriorityQueue->isEmpty()) {
    var_dump($splPriorityQueue->extract());
}