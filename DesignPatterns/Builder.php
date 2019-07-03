<?php

/**
 * 下面我们来构建手机和mp3
 *
 * // 手机简单由以下构成
 * 手机 => 名称，硬件， 软件
 * // 硬件又由以下硬件构成
 * 硬件 => 屏幕，cpu, 内存， 储存， 摄像头
 * // 软件又由以下构成
 * 软件 => android, ubuntu
 *
 * * // mp3简单由以下构成
 * 手机 => 名称，硬件， 软件
 * // 硬件又由以下硬件构成
 * 硬件 => cpu, 内存， 储存
 * // 软件又由以下构成
 * 软件 => mp3 os
 * 
 * builder 导演类
 */

/**
 * 产品构建器
 */
class ProductBuilder
{
    /**
     * 构建参数
     *
     * @var array
     */
    protected $params = [
        'name',
        'hardware',
        'woftware'
    ];

    /**
     * 构建函数
     *
     * @param string $params
     */
    public function __construct($params = [])
    { }

    /**
     * Mp3
     *
     * @param [type] $params
     * @return Product mp3
     */
    public function getMp3(array $params): object
    {
        $this->params = $params;
        $mp3 = new Product($this->params['name']);
        $mp3->addHardware(new HardwareCpu($this->params['hardware']['cpu']));
        $mp3->addHardware(new HardwareRam($this->params['hardware']['ram']));
        $mp3->addHardware(new HardwareStorage($this->params['hardware']['storage']));
        $mp3->addSoftware(new SoftwareOs($this->params['software']['os']));
        return $mp3;
    }

    /**
     * phone
     *
     * @param array $params
     * @return object Phone
     */
    public function getPhone(array $params): object
    {
        $this->params = $params;
        $phone = new Product($this->params['name']);
        $phone->addHardware(new HardwareScreen($this->params['hardware']['screen']));
        $phone->addHardware(new HardwareCamera($this->params['hardware']['camera']));
        $phone->addHardware(new HardwareCpu($this->params['hardware']['cpu']));
        $phone->addHardware(new HardwareRam($this->params['hardware']['ram']));
        $phone->addHardware(new HardwareStorage($this->params['hardware']['storage']));
        $phone->addSoftware(new SoftwareOs($this->params['software']['os']));
        return $phone;
    }
}



class Product
{
    /**
     * 名称
     * @var string
     */
    private $name = '';
    /**
     * 硬件
     * @var array
     */
    private $hardware = [];
    /**
     * 软件
     * @var array
     */
    private $software = [];

    /**
     * 构造函数
     *
     * @param string $name 名称
     */
    public function __construct($name)
    {
        $this->name = $name;
        echo "$name 配置如下：" . PHP_EOL;
    }

    /**
     * 构建硬件
     *
     * @param Hardware $instance
     * @return void
     */
    public function addHardware(Hardware $instance)
    {
        $this->hardware[] = $instance;
    }

    /**
     * 构建软件
     *
     * @param Software $instance
     * @return void
     */
    public function addSoftware(Software $instance)
    {
        $this->software[] = $instance;
    }
}

interface Hardware
{ }
interface Software
{ }
/**
 * 屏幕实体
 */
class HardwareScreen implements Hardware
{
    public function __construct($size = '5.0')
    {
        echo "屏幕大小：" . $size . "寸\n";
    }
}
/**
 * 储存实体
 */
class HardwareStorage implements Hardware
{
    public function __construct($size = 32)
    {
        echo "储存大小：" . $size . "G\n";
    }
}
/**
 * 内存实体
 */
class HardwareRam implements Hardware
{
    public function __construct($size = 6)
    {
        echo "内存大小：" . $size . "G\n";
    }
}
/**
 * 处理器实体
 */
class HardwareCpu implements Hardware
{
    public function __construct($quantity = 8)
    {
        echo "cpu核心数：" . $quantity . "核\n";
    }
}
/**
 * 摄像头实体
 */
class HardwareCamera implements Hardware
{
    public function __construct($pixel = 32)
    {
        echo "摄像头像素：" . $pixel . "像素\n";
    }
}
/**
 * 操作系统实体
 */
class SoftwareOs implements Software
{
    public function produce($os = 'android')
    {
        echo "操作系统：" . $os . "\n";
    }
}


/********************* 调用 ********************/
$builder = new ProductBuilder();

// 生产一款mp3
$builder->getMp3([
    'name' => '某族MP3',
    'hardware' => [
        'cpu'     => 1,
        'ram'     => 1,
        'storage' => 128,
    ],
    'software' => ['os' => 'mp3 os']
]);

// 生产一款手机
$builder->getPhone([
    'name' => '某米8s',
    'hardware' => [
        'screen'  => '5.8',
        'camera'  => '2600w',
        'cpu'     => 4,
        'ram'     => 8,
        'storage' => 128,
    ],
    'software' => ['os' => 'android 6.0']
]);




































interface ProductInterface
{
    /**
     * 构建硬件
     *
     * @return void
     */
    public function hardware();
    /**
     * 构建软件
     *
     * @return void
     */
    public function software();
}

class mp3 implements ProductInterface
{
    /**
     * 名称
     * @var string
     */
    private $_name = '';

    /**
     * 处理器
     * @var string
     */
    private $_cpu = '';

    /**
     * 内存
     * @var string
     */
    private $_ram = '';

    /**
     * 储存
     * @var string
     */
    private $_storage = '';

    /**
     * 系统
     * @var string
     */
    private $_os = '';

    /**
     * 构造函数
     *
     * @param string $name     名称
     * @param array  $hardware 构建硬件
     * @param array  $software 构建软件
     */
    public function __construct($name = '', $hardware = array(), $software = array())
    {
        // 名称
        $this->_name = $name;
        echo $this->_name . " 配置如下：\n";
        // 构建硬件
        $this->hardware($hardware);
        // 构建软件
        $this->software($software);
    }

    /**
     * 构建硬件
     *
     * @param  array  $hardware 硬件参数
     * @return void
     */
    public function hardware($hardware = array())
    {
        // 创建 CPU
        $this->_cpu = new HardwareCpu($hardware['cpu']);

        // 创建内存
        $this->_ram = new HardwareRam($hardware['ram']);

        // 创建存储
        $this->_storage = new HardwareStorage($hardware['storage']);
    }

    /**
     * 构建软件
     * 
     * @param  array  $software 软件参数
     * @return void
     */
    public function software($software = array())
    {
        // 创建操作系统
        $softwareOs     = new SoftwareOs();
        $this->_os      = $softwareOs->produce($software['os']);
    }
}
class phone implements ProductInterface
{
    /**
     * 名称
     * @var string
     */
    private $_name = '';

    /**
     * 屏幕
     * @var string
     */
    private $_screen = '';

    /**
     * 处理器
     * @var string
     */
    private $_cpu = '';

    /**
     * 内存
     * @var string
     */
    private $_ram = '';

    /**
     * 储存
     * @var string
     */
    private $_storage = '';

    /**
     * 相机
     * @var string
     */
    private $_camera = '';

    /**
     * 系统
     * @var string
     */
    private $_os = '';

    /**
     * 构造函数
     * @param string $name     名称
     * @param array  $hardware 构建硬件
     * @param array  $software 构建软件
     */
    public function __construct($name = '', $hardware = array(), $software = array())
    {
        // 名称
        $this->_name = $name;
        echo $this->_name . " 配置如下：\n";
        // 构建硬件
        $this->hardware($hardware);
        // 构建软件
        $this->software($software);
    }

    /**
     * 构建硬件
     * @param  array  $hardware 硬件参数
     * @return void
     */
    public function hardware($hardware = array())
    {
        // 创建屏幕
        $this->_screen  = new HardwareScreen($hardware['screen']);
        // 创建cpu
        $this->_cpu     = new HardwareCpu($hardware['cpu']);
        // 创建内存
        $this->_ram     = new HardwareRam($hardware['ram']);
        // 创建储存
        $this->_storage = new HardwareStorage($hardware['storage']);
        // 创建摄像头
        $this->_camera  = new HardwareCamera($hardware['camera']);
    }

    /**
     * 构建软件
     * @param  array  $software 软件参数
     * @return void
     */
    public function software($software = array())
    {
        // 创建操作系统
        $softwareOs     = new SoftwareOs();
        $this->_os      = $softwareOs->produce($software['os']);
    }
}
