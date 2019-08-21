<?php

namespace hook;

/**
 * @description Hook类
 * @author
 */

class Hook
{
    /**
     * 钩子列表
     * @var array
     */
    protected static $hooks = [];

    /**
     * 批量导入钩子
     * @param  array $data
     */
    public static function import($data)
    {
        foreach ($data as $name => $behaviors) {
            self::register($name, $behaviors);
        }
    }

    /**
     * 在一个钩子下挂载一个或多个行为
     * @param  string $name   钩子名称
     * @param  string $plugin 行为类名
     */
    public static function register($name, $behaviors)
    {
        isset(self::$hooks[$name]) || self::$hooks[$name] = [];
        if (is_array($behaviors)) {
            foreach ($behaviors as $behavior) {
                self::_register($name, $behavior);
            }
        } else {
            self::_register($name, $behaviors);
        }
    }

    /**
     * 在一个钩子下挂载一个行为
     * @param  string $name   钩子名称
     * @param  string $plugin 行为类名
     */
    protected static function _register($name, $behavior)
    {
        if (!class_exists($behavior)) {
            throw new \Exception("Hook '{$behavior}' Not Found!'");
        }
        switch ($behavior) {
            case $behavior instanceof \Closure:
                self::$hooks[$name][] = $behavior;
                break;
            case true:
                self::$hooks[$name][] = new $behavior;
                break;
            default:
                throw new \Exception('not UnsupportedMetadataException');
        }
    }

    /**
     * 触发一个钩子下的行为(按注册顺序执行)
     * @param  string $name   钩子名称
     * @param  array  $params 传入参数
     * @return mixed
     */
    public static function trigger($name, $params = [])
    {
        if (isset(self::$hooks[$name])) {
            foreach (self::$hooks[$name] as &$behavior) {
                call_user_func_array([$behavior, 'exec'], $params);
            }
        }
    }

    public function isClass($class){
        // ReflectionClass 
        return true;
    }
}

//以下是三个行为插件
//必须都实现exec函数
//同一个钩子下的插件的exec函数参数定义需保持一致

class SayHello
{
    public function exec()
    {
        echo 'Hello';
        echo "\n";
    }
}

class SayWorld
{
    public function exec()
    {
        echo 'World';
        echo "\n";
    }
}

class SayName
{
    public function exec($name)
    {
        echo $name;
        echo "\n";
    }
}

$n = __NAMESPACE__ . '\\';

//挂载单个钩子
Hook::register('say1', $n.'SayHello');
Hook::register('say2', $n.'SayWorld');
Hook::register('say3', [$n.'SayWorld', $n.'SayHello']);

//挂载多个钩子
Hook::register('say4', [$n.'SayName', $n.'SayName']);

//批量导入多个钩子
Hook::import([
    'say2' => [$n.'SayWorld', $n.'SayHello'],
    'say1' => [$n.'SayHello', $n.'SayWorld'],
]);

//触发钩子
Hook::trigger('say1');
Hook::trigger('say2');
Hook::trigger('say3');
Hook::trigger('say4', ['cherie']);