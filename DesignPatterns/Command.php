<?php
/**
 * 控制台
 * 负责命令执行
 */
class console
{
	/**
	 * 命令队列
	 */
	private $_orderList=[];
	/**
	 * 添加命令到命令队列
	 */
	public function add(Order $order){
		array_push($this->_orderList, $order);
	}
	/**
	 * 执行命令
	 */
	public function run(){
		foreach($this->_orderList as $v){
			$v->execute();
		}
	}
}
/**
 * 命令接口
 */
interface Order{
	/**
	 * 执行命令方法
	 *
	 * @return void
	 */
	public function execute();
}
/**
 * 文本操作
 */
class Text{
	/**
	 * 创建文本
	 */
	public function create($filename){
		echo '创建了文本'.$filename.PHP_EOL;	
	}
	/**
	 * 写入文本
	 */
	public function write($filename, $content){
		echo '文本'.$filename.'写入了'.$content.PHP_EOL;	
	}
	/**
	 * 保存文本
	 */
	public function save($filename){
		echo '保存文本'.$filename.PHP_EOL;	
	}
}
/**
 * 创建命令
 */
class OrderCreate implements Order
{
	/**
	 * 文本类实体
	 *
	 * @var [type]
	 */
	private $_text;
	
	/**
	 * 命令参数
	 *
	 * @var array
	 */
	private $_arguments = [];

	/**
	 * 构造函数
	 *
	 * @param Text $text
	 * @param [type] $arguments
	 */
	public function __construct(Text $text, $arguments)
	{
		$this->_text = $text;
		$this->_arguments = $arguments;
	}

	/**
	 * 执行命令
	 *
	 * @return void
	 */
	public function execute(){
		$this->_text->create($this->_arguments['filename']);
	}
}
/**
 * 写入文本命令
 */
class OrderWrite implements Order
{
  /**
   * 文本类实体
   * @var object
   */
  private $_text;

  /**
   * 命令参数
   * @var array
   */
  private $_arguments = [
    'filename' => '',
    'content'  => ''
  ];


  /**
   * 构造函数
   *
   * @param Text text
   * @param array $arguments
   */
  public function __construct(Text $text, $arguments=[])
  {
    $this->_text      = $text;
    $this->_arguments = $arguments;
  }

  /**
   * 执行命令
   *
   * @return void
   */
  public function execute()
  {
    $this->_text->Write(
      $this->_arguments['filename'],
      $this->_arguments['content']
    );
  }
}
/**
 * 保存文本命令
 */
class OrderSave implements Order
{
  /**
   * 文本类实体
   * @var object
   */
  private $_text;

  /**
   * 命令参数
   * @var array
   */
  private $_arguments = [
    'filename' => ''
  ];

  /**
   * 构造函数
   *
   * @param Text text
   * @param array $arguments
   */
  public function __construct(Text $text, $arguments=[])
  {
    $this->_text      = $text;
    $this->_arguments = $arguments;
  }

  /**
   * 执行命令
   *
   * @return void
   */
  public function execute()
  {
    $this->_text->save($this->_arguments['filename']);
  }
}
try {
	// 创建一个记事本实例
	$text   = new Text();

	// 创建命令
	$create = new OrderCreate($text, [
		'filename' => 'test.txt'
	]);
	// 写入命令
	$write  = new OrderWrite($text, [
		'filename' => 'test.txt',
		'content'  => 'life is a struggle'
	]);
	// 保存命令
	$save   = new OrderSave($text, [
		'filename' => 'text.txt'
	]);

	// 创建一个控制台
	$console = new Console();
	// 添加命令
	$console->add($create);
	$console->add($write);
	$console->add($save);
	// 运行命令
	$console->run();
} catch (\Exception $e) {
	echo $e->getMessage();
}
