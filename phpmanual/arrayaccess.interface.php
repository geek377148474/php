<?php

/**
 * what is ArrayAccess
 * 
 * ArrayAccess 的作用是使得你的对象可以像数组一样可以被访问
 */

// ArrayAccess {
//     /* Меthods */
//     abstract public offsetExists ( mixed $offset ) : bool
//     abstract public offsetGet ( mixed $offset ) : mixed
//     abstract public offsetSet ( mixed $offset , mixed $value ) : void
//     abstract public offsetUnset ( mixed $offset ) : void
// }

/**
 * @link https://www.cnblogs.com/zyf-zhaoyafei/p/5228652.html
 */
class Test implements ArrayAccess
{
    private $testData;

    public function offsetExists($key)
    {
        return isset($this->testData[$key]);
    }

    public function offsetSet($key, $value)
    {
        $this->testData[$key] = $value;
    }

    public function offsetGet($key)
    {
        return $this->testData[$key];
    }

    public function offsetUnset($key)
    {
        unset($this->testData[$key]);
    }
}

  $obj = new Test();

  //自动调用offsetSet方法
  $obj['data'] = 'data';

  //自动调用offsetExists
  if(isset($obj['data'])){
    echo 'has setting!';
  }
  //自动调用offsetGet
  var_dump($obj['data']);

  //自动调用offsetUnset
  unset($obj['data']);
  var_dump($test['data']);

  //输出：
  //has setting!
  //data  
  //null