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

        array_unshift($parameters, $this);

        return call_user_func_array($this->binds[$abstract], $parameters);
    }
}
