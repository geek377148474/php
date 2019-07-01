<?php

$fruits = array(
    'apple' => 'apple value',
    'orange' => 'orange value',
    'grape' => 'grape value',
    'pear' => 'pear value',
);

dump($fruits); //打印数组
echo '*******user fruits directly' . '<br>';
foreach ($fruits as $key => $value) {
    # code...
    echo $key . ':' . $value . '<br>';
}
//使用ArrayIterator遍历数组
$obj = new ArrayObject($fruits);
$it = $obj->getIterator(); //获得迭代器
echo '*******user ArrayIterator in for' . '<br>';
foreach ($it as $key => $value) {
    # code...
    echo $key . ':' . $value . '<br>';
}
echo '*******user ArrayIterator in while' . '<br>';
$it->rewind(); //调用current之前一定要先调用rewind
while ($it->valid()) {
    echo $it->key() . ':' . $it->current() . '<br>';
    $it->next(); //这个必须加上，要不然死循环
}

//跳过某些元素进行打印
echo '*******user seek before while' . '<br>';
$it->rewind();
if ($it->valid()) {
    $it->seek(1); //跳过第一个元素
    while ($it->valid()) {
        echo $it->key() . ':' . $it->current() . '<br>';
        $it->next(); //这个必须加上，要不然死循环
    }
}
echo '*******user ksort' . '<br>';
$it->ksort(); //对key字典排序
foreach ($it as $key => $value) {
    # code...
    echo $key . ':' . $value . '<br>';
}
echo '*******user asort' . '<br>';
$it->asort(); //对value字典排序
foreach ($it as $key => $value) {
    # code...
    echo $key . ':' . $value . '<br>';
}
