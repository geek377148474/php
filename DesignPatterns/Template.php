<?php

/**
 * 短信抽象类
 *
 * 定义算法结构
 * 明确算法执行顺序
 */
abstract class Sms
{
    /**
     * 运营商配置
     * @var string
     */
    protected $_config = [];

    /**
     * 短信文本
     * @var string
     */
    protected $_text = '[xx公司]你好，你的验证码是';

    /**
     * 构造函数
     *
     * @param array $config 运营商配置
     */
    final function __construct($config = [])
    {
        // 初始化配置
        $this->initialize($config);
    }

    /**
     * 初始化运营商配置
     *
     * 每个厂商的配置不一定相同，所以子类复写这个方法即可
     *
     * @param  array $config 运营商配置
     * @return void
     */
    abstract function initialize($config = []);

    /**
     * 生成短信文本
     *
     * 短信模板和厂商无关
     *
     * @return void
     */
    function makeText()
    {
        $this->_text .= rand(000000, 999999);
    }

    /**
     * 厂商发送短信方法
     *
     * 每个厂商复写这个方法即可
     *
     * @param  integer $mobile 手机号
     * @return void
     */
    abstract function sendSms($mobile = 0);

    /**
     * 发送短信
     *
     * 最终调用的方法，明确了算法顺序
     *
     * @param  integer $mobile 手机号
     * @return void
     */
    final function send($mobile = 0)
    {
        // 生成文本
        $this->makeText();
        // 发送短信
        $this->sendSms($mobile);
    }
}

class SmsCompanyOne extends Sms
{
    /**
     * 初始化运营商配置
     *
     * 每个厂商的配置不一定相同，所以子类复写这个方法即可
     *
     * @param  array $config 运营商配置
     * @return void
     */
    function initialize($config = [])
    {
        // 实现具体算法
        $this->_config = $config;
    }

    /**
     * 厂商发送短信方法
     *
     * 每个厂商复写这个方法即可
     *
     * @param  integer $mobile 手机号
     * @return void
     */
    function sendSms($mobile = 0)
    {
        // 实现具体的短信发送方法
        echo "厂商‘one’给手机号{$mobile}发送了短信：{$this->_text} \n";
    }
}

/**
 * 某厂商two
 */
class SmsCompanyTwo extends Sms
{
    /**
     * 初始化运营商配置
     *
     * 每个厂商的配置不一定相同，所以子类复写这个方法即可
     *
     * @param  array $config 运营商配置
     * @return void
     */
    function initialize($config = [])
    {
        // 实现具体算法
        $this->_config = $config;
    }

    /**
     * 厂商发送短信方法
     *
     * 每个厂商复写这个方法即可
     *
     * @param  integer $mobile 手机号
     * @return void
     */
    function sendSms($mobile = 0)
    {
        // 实现具体的短信发送方法
        echo "厂商‘two’给手机号{$mobile}发送了短信：{$this->_text} \n";
    }
}

try {
    // 用厂商one发短信
    $one = new SmsCompanyOne([
        'appkey' => 'akjlooolllnn',
    ]);
    $one->send('13666666666');

    // 用厂商two发短息
    $one = new SmsCompanyTwo([
        'pwd' => 'adadeooonn',
    ]);
    $one->send('13666666666');
} catch (\Exception $e) {
    echo 'error:' . $e->getMessage();
}
