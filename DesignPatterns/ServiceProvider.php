<?php

/**
 * 服务容器运行原理
 * 
 * 在「绑定」操作仅仅是建立起接口和实现的对应关系
 * 此时并不会创建具体的实例
 * 即不会存在真实的依赖关系
 * 直到某个服务真的被用到时才会从「服务容器」中解析出来
 * 而解析的过程发生在所有服务「注册」完成之后
 */

/**
 * 常用绑定方法
 * 
 * bind($abstract, $concrete) 简单绑定：将实现绑定到接口，解析时每次返回新的实例；
 * singleton($abstract, $concrete) 单例绑定：将实现绑定到接口，与 bind 方法不同的是首次解析是创建实例，后续解析时直接获取首次解析的实例对象；
 * instance($abstract, $instance) 实例绑定：将实现实例绑定到接口；
 * 上下文绑定和自动注入。
 * 
 */


interface AbstractServiceProvider
{

    /**
     * Bootstrap the application services.引导启动应用服务。
     *
     * @return void
     */
    public function boot();
    /**
     * Register the application services. 注册应用服务。
     *
     * @return void
     */
    public function register();
}

class ServiceProvider
{
    /**
     * 设定容器绑定的对应关系
     *
     * @var array
     */
    public $bindings = [];

    /**
     * 设定单例模式的容器绑定对应关系
     *
     * @var array
     */
    public $singletons = [];

    // 注册事件监听器、引入路由文件、注册过滤器
    public function boot()
    { }

    // 处理「绑定」服务到服务容器
    public function register()
    { }
}
