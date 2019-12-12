<?php

/**
 * 数据库连接池PDO方式
 * User: user
 * Date: 2018/9/8
 * Time: 11:30
 */
require "AbstractPool.php";

class MysqlPoolPdo extends AbstractPool
{
    protected $dbConfig = array(
        'host' => 'mysql:host=10.0.2.2:3306;dbname=test',
        'port' => 3306,
        'user' => 'root',
        'password' => 'root',
        'database' => 'test',
        'charset' => 'utf8',
        'timeout' => 2,
    );
    public static $instance;

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new MysqlPoolPdo();
        }
        return self::$instance;
    }

    protected function createDb()
    {
        return new PDO($this->dbConfig['host'], $this->dbConfig['user'], $this->dbConfig['password']);
    }
}

/**
代码调用过程详解：
1、server启动时，调用init()方法初始化最少数量(min指定)的连接对象，放进类型为channelle的connections对象中。
    在init中循环调用中，依赖了createObject()返回连接对象，而createObject()
    中是调用了本来实现的抽象方法，初始化返回一个PDO db连接。所以此时，连接池connections中有min个对象。

2、server监听用户请求，当接收发请求时，调用连接数的getConnection()方法从connections通道中pop()一个对象。
    此时如果并发了10个请求，server因为配置了1个worker,所以再pop到一个对象返回时，遇到sleep()的查询，
    因为用的连接对象是pdo的查询，此时的woker进程只能等待，完成后才能进入下一个请求。
    因此，池中的其余连接其实是多余的，同步客户端的请求速度只能和woker的数量有关。

3、查询结束后，调用free()方法把连接对象放回connections池中
 */

$httpServer = new swoole_http_server('0.0.0.0', 9501);
$httpServer->set(
    ['worker_num' => 1]
);
$httpServer->on("WorkerStart", function () {
    MysqlPoolPdo::getInstance()->init();
});
$httpServer->on("request", function ($request, $response) {
    $db = null;
    $obj = MysqlPoolPdo::getInstance()->getConnection();
    if (!empty($obj)) {
        $db = $obj ? $obj['db'] : null;
    }
    if ($db) {
        $db->query("select sleep(2)");
        $ret = $db->query("select * from guestbook limit 1");
        MysqlPoolPdo::getInstance()->free($obj);
        $response->end(json_encode($ret));
    }
});
$httpServer->start();