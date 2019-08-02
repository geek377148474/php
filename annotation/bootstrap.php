<?php
/**
 * @元数据
 *
 * 所谓元数据就是数据的数据，即元数据是描述数据的。
 * 就象数据表中的字段一样，每个字段描述了这个字段下的数据的含义。
 * 元数据可以用于创建文档，跟踪代码中的依赖性，甚至执行基本编译时检查。
 * 许多元数据工具，如XDoclet，将这些功能添加到核心Java语言中，暂时成为Java编程功能的一部分。
 * 一般来说，元数据的好处分为三类：文档编制、编译器检查和代码分析。
 * 代码级文档最常被引用。元数据提供了一种有用的方法来指明方法是否取决于其他方法，它们是否完整，特定类是否必须引用其他类，等等。
 * 

 */

/**
 * @注解
 * 
 * 元数据就是附加在数据/代码上的元数据（metadata）
 * 框架可以基于这些元信息为代码提供各种额外功能。
 * Java中的注解就是Java源代码的元数据，也就是说注解是用来描述Java源代码的。  基本语法就是：@后面跟注解的名称。
 */

/**
 * @如何读取注解
 *
 * 读取注解的内容，需要使用反射技术
 */

// require 'example.php';

// require 'testOne.php';

// require 'testTwo.php';


// require 'parse.php';

# 实现能往数组任意一层push一个value
function runInDepth(&$arr, $end, $value, $key=false, $depth=0) {
    if (!is_array($arr)) {

        return $end;
        throw new \Exception('该数组的维度是'.$depth);
        return false;
    }
    if ($end===0) {
        if (!$key) {
            $arr[] = $value;
        }else{
            $arr[$key] = $value;
        }
        return $arr;
    }
    $end -= $depth===0 ? 1 : 0;
    $depth++;
    $tmp = end($arr);
    $tmpkey = array_search($tmp, $arr);
    $end--;
    $arr[$tmpkey] = runInDepth($tmp, $end, $value, $key, $depth);
    return $arr;
}

$arr = [
    ['a'],
    ['b'],
    [
        'c'=>[1,2,3],
    ],
];
$arr = runInDepth($arr, 1, 'd',4);
dump($arr);
die;
$log = file_get_contents(WORK_DIR.'/phptrace/log.txt');
$log = preg_replace('@\[pid.*?\]@','', $log);
preg_match_all('@.*\s>\s.*@', $log, $matches);
$logArr=[];
foreach($matches[0] as $v){
    preg_match_all('@\s{4}@', $v, $match);
    $count = count($match[0]);

}