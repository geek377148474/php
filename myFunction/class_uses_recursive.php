<?php
/**
 * @phpmanual
 * class_parents @return parents
 * class_uses @return traits
 */

/**
 * Returns all traits used by a trait and its traits.
 *
 * @param string $trait
 * @return array
 */
function trait_uses_recursive($trait)
{
    $traits = class_uses($trait);

    foreach ($traits as $trait) {
        $traits += trait_uses_recursive($trait);
    }

    return $traits;
}

/**
 * Returns all traits used by a class, its parent classes and trait of their traits.
 *
 * @param object|string $class
 * @return array
 */
function class_uses_recursive($class)
{
    if (is_object($class)) {
        $class = get_class($class);
    }

    $results = [];
    dump(array_reverse(class_parents($class)) + [$class => $class]);
    foreach (array_reverse(class_parents($class)) + [$class => $class] as $class) {
        $results += trait_uses_recursive($class);
    }

    return array_unique($results);
}

interface Animal{
    public function aaa();
}

trait bbb{
    function bbb(){
        echo __CLASS__;
    }
}

trait ccc{
    function ccc(){
        echo __CLASS__;
    }
}

abstract class people implements Animal{
    use ccc;
    abstract public function aaa();
}

class Man extends people{
    use bbb,ccc;
    public function aaa(){
        echo __CLASS__;
    }
}
/**
 * foreach
 */
// $arr = ['e'=>'f'];
// foreach (['a'=>'b'] + ['c'=>'d'] + $arr as $value) {
//     echo sprintf('<pre>%s</pre>', print_r($value, true));
// }
/**
 * + 号组合数组用法（根据key组合）
 * 不同于array_merge 和 array_merge_recursive
 * 同个key 保存前者的value
 * 不同key merge in
 * 
 * 若没有相同的key
 * 仅有merge且相当于merge
 * @link
 */
// dump([1]+[2,3]);

dump(class_uses(people::class));
dump(class_uses(Man::class));


$class = Man::class;
echo sprintf('<pre>%s</pre>', print_r(class_uses_recursive($class), true));
