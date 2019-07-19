<?php

/**
 * 利用闭包实现extend
 */

class container
{
    public $_name = __CLASS__;

    public $_extendMethod = [];

    public $_extendObject = [];

    public function __call($methodName, $args)
    {
        if (isset($this->_extendMethod[$methodName])) {
            return $this->_extendMethod[$methodName]($args);
        }

        throw new \Exception('method not extends');
    }

    public function say($string)
    {
        $method = __FUNCTION__;
        return $this->_extendObject[$method]->$method($string);
    }

    public function bind($extendName, $extend, $newthis = false)
    {
        $newthis = is_object($newthis) ? $newthis : $this;
        if ($extend instanceof Closure) {
            $func = Closure::bind($extend($this->_name), $newthis);
            $this->_extendMethod[$extendName] = $func;
            return $this;
        }
        if (is_object($extend)) {
            $this->_extendObject[$extendName] = $extend;
            return $this;
        }

        throw new \Exception('也许需要扩展...');
    }
}
class classA
{
    public function say($string)
    {
        return __CLASS__ . ' ' . $string;
    }
}
$Container = new Container();
echo $Container->bind('description', function ($caller) {
    return function ($string) use ($caller) {
        $string = is_array($string) ? implode('', $string) : $string;
        return $caller . ' ' . $string;
    };
})->description('is ok');
echo $Container->bind('say', new classA())->say('is ok');
