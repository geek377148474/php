<?php

namespace Container;
/**
 * IOC服务容器 - 超级工厂
 */
class Container
{
    public $binds = [];

    public $instances;

    /**
     * 绑定一个方法或者对象到容器上
     *
     * @param string $abstract 容器身份ID
     * @param $concrete
     */
    public function bind($abstract, $concrete)
    {
        if ($concrete instanceof \Closure) {
            $this->binds[$abstract] = $concrete;
        } else {
            $this->instances[$abstract] = $concrete;
        }
    }

    /**
     * 通过容器身份ID调用对应的方法或对象
     *
     * @param $abstract
     * @param array $parameters
     * @return mixed
     */
    public function make($abstract, $parameters = [])
    {
        if (isset($this->instances[$abstract])) {
            return $this->instances[$abstract];
        }

        $parameters = $this->through($parameters);

        array_unshift($parameters, $this);

        return call_user_func_array($this->binds[$abstract], $parameters);
    }

    public function through($parameters)
    {
        return $parameters = is_array($parameters) ? $parameters : func_get_args();
        // return $this;
    }
}

/**
 * IOC服务容器 - 反射解决依赖
 */
class SuperContainer
{
    public $_instance=[];

    /**
     * 实现完成依赖自动注入
     * @param \Closure|string|null $concrete
     */
    public function make($class)
    {
        $class = is_string($class) ? new \ReflectionClass($class) : $class;

        $constructor = $class->getConstructor();

        $parametersClasses = ! is_null($constructor) ? $constructor->getParameters() : [];

        if (! $parametersClasses) return $class->newInstance();

        foreach ($parametersClasses as $parametersClass) {
            $params[] = $this->make($parametersClass->getClass());
        }
        return $class->newInstanceArgs($params);
    }
}

class Me
{
    protected $something;

    public function __construct(Something $something)
    {
        $this->something = $something;
    }
}
interface Something
{

}
class SomethingA implements Something
{

}
class SomethingB implements Something
{

}
class You{
    public $something;
    public function __constructor(SomethingA $something){
        $this->something = $something;
    }
}
