<?php
/**
 * 连接池封装.
 * User: user
 * Date: 2018/9/1
 * Time: 13:36
 */

use Swoole\Coroutine\Channel;

/*
创建连接：连接池启动后，初始化一定的空闲连接，指定为最少的连接min。
    当连接池为空，不够用时，创建新的连接放到池里，但不能超过指定的最大连接max数量。
连接释放：每次使用完连接，一定要调用释放方法，把连接放回池中，给其他程序或请求使用。
连接分配：连接池中用pop和push的方式对等入队和出队分配与回收。
    能实现阻塞分配，也就是在池空并且已创建数量大于max，阻塞一定时间等待其他请求的连接释放，超时则返回null。
连接管理：对连接池中的连接，定时检活和释放空闲连接等
 */
/**
 * Class AbstractPool
 * 实现业务
 * 1.创建连接
 * 2.释放连接
 * 3.连接分配
 * 4.连接管理
 */
abstract class AbstractPool
{
    private $min;//最少连接数
    private $max;//最大连接数
    private $count;//当前连接数
    private $connections;//连接池组
    protected $spareTime;//用于空闲连接回收判断
    //数据库配置
    protected $dbConfig = array(
        'host' => '10.0.2.2',
        'port' => 3306,
        'user' => 'root',
        'password' => 'root',
        'database' => 'test',
        'charset' => 'utf8',
        'timeout' => 2,
    );

    private $inited = false;

    /**
     * @return mixed
     */
    protected abstract function createDb();

    /**
     * AbstractPool constructor.
     */
    public function __construct()
    {
        $this->min = 10;
        $this->max = 100;
        $this->spareTime = 10 * 3600;
        $this->connections = new Channel($this->max + 1);
    }

    /**
     * @return array|null
     */
    protected function createObject()
    {
        $obj = null;
        $db = $this->createDb();
        if ($db) {
            $obj = [
                'last_used_time' => time(),
                'db' => $db,
            ];
        }
        return $obj;
    }

    /**
     * 初始化最小数量连接池
     * @return $this|null
     */
    public function init()
    {
        if ($this->inited) {
            return null;
        }
        for ($i = 0; $i < $this->min; $i++) {
            $obj = $this->createObject();
            $this->count++;
            $this->connections->push($obj);
        }
        return $this;
    }

    /**
     * @param int $timeOut
     * @return array|mixed|null
     */
    public function getConnection($timeOut = 3)
    {
        $obj = null;
        if ($this->connections->isEmpty()) {
            if ($this->count < $this->max) {//连接数没达到最大，新建连接入池
                $this->count++;
                $obj = $this->createObject();
            } else {
                $obj = $this->connections->pop($timeOut);//timeout为出队的最大的等待时间
            }
        } else {
            $obj = $this->connections->pop($timeOut);
        }
        return $obj;
    }

    /**
     * @param $obj
     */
    public function free($obj)
    {
        if ($obj) {
            $this->connections->push($obj);
        }
    }

    /**
     * 处理空闲连接
     */
    public function gcSpareObject()
    {
        //大约2分钟检测一次连接
        swoole_timer_tick(120000, function () {
            $list = [];
            /*echo "开始检测回收空闲链接" . $this->connections->length() . PHP_EOL;*/
            if ($this->connections->length() < intval($this->max * 0.5)) {
                echo "请求连接数还比较多，暂不回收空闲连接\n";
                return;
            }#1
            while (true) {
                if (!$this->connections->isEmpty()) {
                    $obj = $this->connections->pop(0.001);
                    $last_used_time = $obj['last_used_time'];
                    if ($this->count > $this->min && (time() - $last_used_time > $this->spareTime)) {//回收
                        $this->count--;
                    } else {
                        array_push($list, $obj);
                    }
                } else {
                    break;
                }
            }
            foreach ($list as $item) {
                $this->connections->push($item);
            }
            unset($list);
        });
    }
}