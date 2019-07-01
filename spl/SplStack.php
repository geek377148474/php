<?php
$stack = new SplStack();

$stack->push('a');
$stack->push('b');
$stack->push('c'); //入栈

dump($stack);
echo 'bottom:' . $stack->bottom() . PHP_EOL;
echo "top:" . $stack->top() . PHP_EOL;
//堆栈的offset=0,是TOP所在位置（即栈的末尾）,offset=1是top位置节点靠近bottom位置的相连节点
$stack->offsetSet(0, 'C');

dump($stack);

//双向链表的rewind和堆栈的rewind,相反，堆栈的rewind使得当前指针指向top所在位置，而双向链表调用之后指向bottom所在位置
$stack->rewind();

echo 'current:' . $stack->current() . PHP_EOL;

$stack->next(); //堆栈的next操作使指针指向靠近bottom位置的下一个节点，而双向链表是靠近top的下一个节点
echo 'current:' . $stack->current() . PHP_EOL;

//遍历堆栈

$stack->rewind();
while ($stack->valid()) {
    echo $stack->key() . '=>' . $stack->current() . PHP_EOL;
    $stack->next(); //不从链表中删除元素
}

//删除堆栈数据
$popObj = $stack->pop(); //弹出最后一个元素，并删除该节点
echo 'pop object:' . $popObj . PHP_EOL;
dump($stack);
