<?php
require 'common/function.php';

#===================== 数据结构 ======================#

# [模拟链表的基本操作]
require 'dataStructure/Node.php';
$linkList = new Node();
init($linkList); //初始化
createTail($linkList, 10); //尾插法创建链表
show($linkList); //打印出链表
insert($linkList, 3, 'a'); //插入
show($linkList);
delete($linkList, 3); //删除
show($linkList);
