<?php
$a = 1;
$b = 10;
$c = 100;
(function ($b) {
    $num = func_num_args();
    $args = func_get_args();
    dump($num);
    dump($args);
    $c = func_get_arg(1);
    var_dump(100 == func_get_arg(1));
    $a = $b + 1;
    dump($a);
})($b, $c);

# 不影响外界变量
dump($a);
