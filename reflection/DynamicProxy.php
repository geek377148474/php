<?php

//调用B的show方法时候去调用A的show方法
class A
{
    function show()
    {
        echo "classA的show方法";
    }
}
class B
{
    private $obj;
    function __construct()
    {
        $this->obj = new A();
    }
    function __call($name, array $arguments)
    {
        $ref = new ReflectionClass($this->obj);
        if ($ref->hasMethod($name)) {
            $method = $ref->getMethod($name);
            if ($method->isPublic() && !$method->isAbstract()) {
                $invoke = is_array($arguments) ? 'invokeArgs' : 'invoke';
                if ($method->isStatic()) {
                        $method->$invoke(null, $arguments);
                } else {
                    $method->$invoke($this->obj, $arguments);
                }
            }
        }
    }
}

$b = new B();
$b->show();
