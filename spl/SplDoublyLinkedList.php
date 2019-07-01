<?php
/**
 *SplDoublyLinkedList 类学习
 */
$obj = new SplDoublyLinkedList();
$obj->push(1); //把新的节点添加到链表的顶部top
$obj->push(2);
$obj->push(3);
$obj->unshift(10); //把新节点添加到链表底部bottom
dump($obj);
$obj->rewind(); //rewind操作用于把节点指针指向Bottom所在节点
$obj->prev(); //使指针指向上一个节点，靠近Bottom方向
echo 'next node :' . $obj->current() . PHP_EOL;
$obj->next();
$obj->next();
echo 'next node :' . $obj->current() . PHP_EOL;
$obj->next();
if ($obj->current()) {
    echo 'current node valid' . PHP_EOL;
} else {
    echo 'current node invalid' . PHP_EOL;
}

$obj->rewind();
//如果当前节点是有效节点，valid返回true
if ($obj->valid()) {
    echo 'valid list' . PHP_EOL;
} else {
    echo 'invalid list' . PHP_EOL;
}

dump($obj);
echo 'pop value :' . $obj->pop() . PHP_EOL;
dump($obj);
echo 'next node :' . $obj->current() . PHP_EOL;
$obj->next(); //1
$obj->next(); //2
$obj->pop(); //把top位置的节点从链表中删除，并返回，如果current正好指>向top位置，那么调用pop之后current()会失效
echo 'next node:' . $obj->current() . PHP_EOL;
dump($obj);

$obj->shift(); //把bottom位置的节点从链表中删除，并返回
dump($obj);
