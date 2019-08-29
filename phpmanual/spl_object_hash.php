<?php
class A{
    public $a=1;
}
$object = new A();
$id = spl_object_hash($object);
$id2 = spl_object_hash($object);
$storage[$id] = $object;
sleep(1);
$storage[$id2] = $object;
pp($storage);
/*
when in the same process, they always have the same hash
array(1) {
  [0]=>
  array(1) {
    ["0000000000b39576000000005bad86a3"]=>
    object(A)#8 (1) {
      ["a"]=>
      int(1)
    }
  }
}
 */
$obj = new stdClass;
$id1 = spl_object_hash($obj);
$id2 = spl_object_hash(new stdClass);
echo $id1.'<br>'.$id2;
/*
not different because they come from different object
000000005cfadc0d000000003463043f
000000005cfadc0e000000003463043f
 */