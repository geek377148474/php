<?php
// 基于PHP闭包能实现上下文绑定 进而实现扩展类的方法及属性

/**
 * 以下实现了调用提供闭包方法的类的该闭包方法
 * 不需要为了获得类方法而去继承，只需要根据接口编写提供闭包方法的扩展类即可
 * 
 * 该方法类似trait 但可以自己控制作用域
 */
interface extender{
    public function getFunc($type = '');
}

class RegularClass
{
    private $_name = 'REGULAR';
}
class Holder
{
    private $_name = 'HOLDER';

    private $methodName = 'HolderFunc';

    public function getFunc($type = '')
    {
        if ($type == 'name'){
            // return 'HolderFunc';
            return $this->methodName;
        }

        $func = function () {
            // this is a static function unfortunately
            // try to access properties of bound instance
            echo $this->name;
        };
       
        return $func;
    }

    public function __get($name){
        $name = '_'.$name;
        return $this->$name;
    }

}
class StaticFunctions
{
    private $_name = 'STATIC';

    private $_origin = 'STATIC';

    private $_extend = [];

    /**
     * Undocumented function
     *
     * @param [type] $h 提供方法者
     * @param [type] $newthis 指定作用域 可以是任意对象
     * @return void
     */
    public function extend($h, $newthis = false)
    {
        // $h = new Holder();
        // $rc = new RegularClass();
        // $bfunc = Closure::bind($h->getFunc(), $rc, 'RegularClass');
        // $bfunc = Closure::bind($h->getFunc(), $h, 'RegularClass');
        // $bfunc = Closure::bind($h->getFunc(), $this, 'RegularClass');
        $newthis = is_object($newthis) ? $newthis : $this;
        if (is_callable($h)) {
            $bfunc = Closure::bind($h(), $newthis);
            $this->_extend[$h('name')] = $bfunc;
            return $this;
        }
        if (is_object($h)) {
            $bfunc = Closure::bind($h->getFunc(), $newthis);
            $this->_extend[$h->getFunc('name')] = $bfunc;
    
            return $this;
        }

        throw new \Exception('也许需要扩展...');
    }

    public function __call($method, $args){
        $this->_extend[$method]($args);
    }

    public function __get($name){
        $name = '_'.$name;
        return $this->$name;
    }
}
$h = new Holder();
$rc = new RegularClass();
$static = new StaticFunctions();
$static->extend($h);
// $static->extend($h, $h);
// $static->extend($h, $rc);
// $static->extend($h, $static);
$static->HolderFunc();


echo '<br>';


$static->extend(function($type = ''){
    if ($type=='name') {
        return 'test';
    }
    
    return function () {
        echo $this->name;
    };
}, $h);
$static->test();
echo '<br>';
echo $static->origin;