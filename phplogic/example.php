<?php
// 以下证明了and和or的优先级是低于=的
// 慎重使用 and , or 和 xor 的逻辑运算符
// 避免和赋值号以及 && 和 || 一起用, 以免发生不必要的逻辑错误.
// 但是PHP并不完全遵守优先级的定义
##
$bA = true;
$bB = false;
$b1 = $bA and $bB;
$b2 = $bA && $bB;
var_dump($b1); // $b1 = true
var_dump($b2); // $b2 = false
 
$bA = false;
$bB = true;
$b3 = $bA or $bB;
$b4 = $bA || $bB;
var_dump($b3); // $b3 = false
var_dump($b4); // $b4 = true

##
$bA = true;
$bB = false;
var_dump($bA and $bB); // false
var_dump($bA && $bB); // false
 
$bA = false;
$bB = true;
var_dump($bA or $bB); // true
var_dump($bA || $bB); // true

##
$a=1 and $a=2 or $b=3 and $b=4;
echo $a;

##
if ($a = 100 && $b = 200) {
    var_dump($a, $b);
}

$t = 1;
$t == 1 && $tt = 2;
echo $tt;
// 按照php运算符优先级应该是
// (($t == 1) && $tt) = 2;
// 这个顺序执行，但实际上应该是
// ($t == 1) && ($tt = 2);