<?php

/*
SplPriorityQueue implements Iterator , Countable {}

@PHP 优先级队列
以Heap数据结构实现
默认为MaxHeap模式
priority越大越优先出队
可以通过重写compare方法来使用MinHeap（优先级越低越优先出队)

以堆数据结构实现
当我们出队时会拿出堆顶的元素
此时堆的特性被破坏
堆会进行相应的调整至稳定态(MaxHeap or MinHeap)
即会将最后一个元素替换到堆顶
然后进行稳定态验证
不符合堆特性则继续调整
或者我们就得到了一个稳定态的堆
所以当优先级相同
出队顺序并不会按照入队顺序

*/
$splPriorityQueue = new \SplPriorityQueue();
// 设定返回数据的meta信息
// \SplPriorityQueue::EXTR_DATA 默认 只返回数
// \SplPriorityQueue::EXTR_PRIORITY 只返回优先级
// \SplPriorityQueue::EXTR_BOTH 返回数据和优先级
// $splPriorityQueue->setExtractFlags(\SplPriorityQueue::EXTR_DATA);
$splPriorityQueue->insert("task1", 1);
$splPriorityQueue->insert("task2", 1);
$splPriorityQueue->insert("task3", 1);
$splPriorityQueue->insert("task4", 1);
$splPriorityQueue->insert("task5", 1);

echo $splPriorityQueue->extract() . PHP_EOL;
echo $splPriorityQueue->extract() . PHP_EOL;
echo $splPriorityQueue->extract() . PHP_EOL;
echo $splPriorityQueue->extract() . PHP_EOL;
echo $splPriorityQueue->extract() . PHP_EOL;

// 执行结果
// task1
// task5
// task4
// task3
// task2

/*
1、入队 task1, task2, task3, task4, task5，因为优先级相同，所以堆一直处于稳定态。
2、出队，得 task1，堆先将结构调整为 task5, task2, task3, task4，已然达到了稳定态。
3、出队，得 task5，堆先将结构调整为 task4, task2, task3，已然达到了稳定态。
4、出队，得 task4，堆先将结构调整为 task3, task2，已然达到了稳定态。
5、出队，得 task3，堆先将结构调整为 task2，已然达到了稳定态。
4、出队，得 task2。
*/





