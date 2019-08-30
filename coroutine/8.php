<?php

use Swoole\Coroutine;

class Context {

    protected static $pool = [];

    public static function cid():int {
        return Coroutine::getuid();
    }

    public static function get($key, int $cid = null) {
        $cid = $cid ?? Coroutine::getuid();
        if ($cid < 0) {
            return null;
        }
        if (isset(self::$pool[$cid][$key])) {
            return self::$pool[$cid][$key];
        }
        return null;
    }

    public static function put($key, $item, int $cid = null) {
        $cid = $cid ?? Coroutine::getuid();
        if ($cid > 0) {
            self::$pool[$cid][$key] = $item;
        }
        return $item;
    }

    public static function delete($key, int $cid = null) {
        $cid = $cid ?? Coroutine::getuid();
        if ($cid > 0) {
            unset(self::$pool[$cid][$key]);
        }
    }

    public static function destruct(int $cid = null) {
        $cid = $cid ?? Coroutine::getuid();
        if ($cid > 0) {
            unset(self::$pool[$cid]);
        }
    }
}

/*
defer用于资源的释放, 会在协程关闭之前(即协程函数执行完毕时)进行调用, 就算抛出了异常, 已注册的defer也会被执行.

需要注意的是, 它的调用顺序和go语言中的defer一样是逆序的（先进后出）, 也就是先注册defer的后执行,
在底层defer列表是一个stack, 先进后出. 逆序符合资源释放的正确逻辑, 后申请的资源可能是基于先申请的资源的,
如先释放先申请的资源, 后申请的资源可能就难以释放。

与Go语言不同的是Swoole4的defer是协程退出前执行。这是因为Go没有提供析构方法，而PHP对象有析构函数，
 */

go(function () {
    $info = Context::get('info', Co::getuid()); // get context of this coroutine
    defer(function () {
        Context::delete('info', Co::getuid()); // delete
    });
    throw new Exception('something wrong');
    echo "never here\n";
});
