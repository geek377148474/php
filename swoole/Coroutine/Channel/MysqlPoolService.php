<?php
/**
 * Created by PhpStorm.
 * User: jskj
 * Date: 2019/10/29
 * Time: 14:15
 */

namespace App\Service;

use EasySwoole\EasySwoole\Config;
use Swoole\Coroutine;
use Swoole\Coroutine\Channel;
use Swoole\Coroutine\MySQL;

/**
 * Class MysqlPoolService   mysql连接池
 * @package App\Service
 */
class MysqlPoolService
{
    protected static $instance;
    protected $config;
    protected $pool;
    protected $count;
    protected $max;
    protected $min;
    protected $timeout;
    protected $spareTime;
    protected $dbConfig;
    private $isInit = false;

    public static function getInstance()
    {
        if(empty(self::$instance)){
            self::$instance = new static();
        }
        return self::$instance;
    }

    protected function __construct()
    {
        $this->config = Config::getInstance()->getConf('MYSQL-POOL');
        if (empty($this->pool)) {
            $this->dbConfig    = $this->config['master'];
            $this->min          = $this->config['master']['pool_size'];
            $this->max          = $this->config['master']['pool_max_size'];
            $this->spareTime    = $this->config['master']['pool_spare_time'];
            $this->timeout      = $this->config['master']['pool_get_timeout'];
            $this->pool         = new channel($this->max);
            $this->init();
            $this->gcSpareTime();
        }
    }

    public function init(){
        if ($this->isInit) {
            return true;
        }
        for ($i=0;$i<$this->min;$i++) {
            $mysql = $this->createDb();
            $this->pool->push([
                'mysql' => $mysql,
                'last_used_time' => time()
            ]);
            $this->count++;
        }
        return $this->isInit=true;
    }

    /**
     * 获取连接
     *
     * @return MySQL
     */
    public function get():MySQL
    {
        if ($this->pool->isEmpty()) {
            $mysql = $this->build();
            $one = $this->setOne($mysql);
        }else{
            $one = $this->pool->pop($this->timeout);
        }
        if (!$this->isValid($mysql)) {
            $mysql = $this->createDb();
            $one = $this->setOne($mysql);
        }
        Coroutine::defer(function () use ($one) { //释放
            $this->pool->push($one);
        });
        return $one['mysql'];
    }

    protected function setOne($mysql){
        return [
            'last_used_time' => time(),
            'mysql' => $mysql
        ];
    }

    protected function build()
    {
        if ($this->count < $this->max) {
            $mysql = $this->createDb();
            $one = $this->setOne($mysql);
            $this->count++;
        }else{
            $one = $this->pool->pop($this->timeout);
        }
        return $one;
    }

    protected function createDb(){
        $mysql = new MySQL();
        $mysql->connect($this->dbConfig);
        return $mysql;
    }

    /**
     * 检查当前连接是否失效
     *
     * @param MySQL $mysql
     * @return bool
     */
    protected function isValid(MySQL &$mysql)
    {
        try{
            $data = $mysql->query('select 1');
            if($data == false){
                return false;
            }
            return true;
        }catch (\Throwable $throwable){
            $mysql = null;
            return false;
        }
    }

    protected function gcSpareTime(){
        swoole_timer_tick(120000,function(){
            if ($this->pool->length() < $this->max * 0.5) {
                return;
            }
            $list = [];
            while(!$this->pool->isEmpty()){
                $one = $this->pool->pop($this->timeout);
                if ($this->count > $this->min && $one['last_used_time'] + $this->spareTime < time()) {
                    $this->unset($one['mysql']);
                }else{
                    array_push($list,$one);
                }
            }
            array_walk($list,function($one){
                $this->pool->push($one);
            });
        });
    }

    protected function unset(MySQL $mysql){
        $this->isValid($mysql) && $mysql->close();
        $this->count--;
        return true;
    }
}