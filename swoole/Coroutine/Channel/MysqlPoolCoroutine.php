<?php
/**
 * 数据库连接池协程方式
 * User: user
 * Date: 2018/9/8
 * Time: 11:30
 */
require "AbstractPool.php";

class MysqlPoolCoroutine extends AbstractPool
{
    protected $dbConfig = array(
        'host' => '127.0.0.1',
        'port' => 3306,
        'user' => 'localuser',
        'password' => '8212',
        'database' => 'test',
        'charset' => 'utf8',
        'timeout' => 10, // 超时前返回 data|false
    );
    public static $instance;

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new MysqlPoolCoroutine();
        }
        return self::$instance;
    }

    protected function createDb()
    {
        $db = new Swoole\Coroutine\Mysql();
        $db->connect(
            $this->dbConfig
        );
        return $db;
    }
}

/*
代码调用过程详解
1、同样的，协程客户端方式下的调用，也是实现了之前封装好的连接池类AbstractPool.php。
    只是createDb()的抽象方法用了swoole内置的协程客户端去实现。

2、server启动后，初始化都和同步一样。不一样的在获取连接对象的时候，此时如果并发了10个请求，同样是配置了1个worker进程在处理，
    但是在第一请求到达，pop出池中的一个连接对象，执行到query()方法，
    遇上sleep阻塞时，此时，woker进程不是在等待select的完成，而是切换到另外的协程去处理下一个请求。
    完成后同样释放对象到池中。当中有重点解释的代码段中getConnection()中。

    当调用到getConnection()时，如果此时由于大量并发请求过多，连接池connections为空，
    而没达到最大连接max数量时时，代码运行到#1处，调用了createObject(),
    新建连接返回；但如果连接池connections为空，而到达了最大连接数max时，代码运行到了#2处，
    也就是$this->connections->pop($timeOut)，此时会阻塞$timeOut的时间，
    如果期间有链接释放了，会成功获取到，然后协程返回。超时没获取到，则返回false。

3、最后说一下协程Mysql客户端一项重要配置，那就是代码里$dbConfig中timeout值的配置。这个配置是意思是最长的查询等待时间
 */
$httpServer = new swoole_http_server('0.0.0.0', 9501);
$httpServer->set(
    ['worker_num' => 1]
);
$httpServer->on("WorkerStart", function () {
    echo 'worker is start:'.PHP_EOL;
    //MysqlPoolCoroutine::getInstance()->init()->gcSpareObject();
    MysqlPoolCoroutine::getInstance()->init();
});

$httpServer->on("request", function ($request, $response) {
    $db = null;
    $obj = MysqlPoolCoroutine::getInstance()->getConnection();
    if (!empty($obj)) {
        $db = $obj ? $obj['db'] : null;
    }
    if ($db->connect_errno != 0) {
        throw new \Exception('connected fail:'.$db->connect_error);
    }
    if ($db) {
        $db->query("select sleep(2)");
        $ret = $db->query("select * from address limit 1");
        MysqlPoolCoroutine::getInstance()->free($obj);
        $response->end(json_encode($ret));
    }
});

$httpServer->start();

/**
 * 协程的客户端内执行其实是同步的，不要理解为异步，它只是遇到IO阻塞时能让出执行权，切换到其他协程而已，不能和异步混淆。
 */

/*
TODO:
现在连接池
基本实现了高并发时的连接分配和控制，但是还有一些细节要处理，例如：

1.并发时，建立了max个池对象，不能一直在池中维护这么多，
    要在请求空闲时，把连接池的数量维持在一个空闲值内。
    这里是简单做了gcSpareObject()的方法实现空闲处理。
    直接在初始化woker的时候调用：MysqlPoolCoroutine::getInstance()->init()->gcSpareObject();
    就会定时检测回收。问题是如何判断程序比较空闲，值得再去优化。

2.定时检测连接时候是活的，剔除死链

3.假如程序忘记调用free()释放对象到池，是否有更好方法避免这种情况？
*/