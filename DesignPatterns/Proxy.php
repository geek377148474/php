<?php

#===========================================================================#
# ====== 静态代理 ====== #
/**
 * 鞋接口
 */
interface ShoesInterface
{
	/**
	 * @return void 鞋会办的事
	 */
	public function product();
}

/**
 * 运动鞋类
 */
class Proxy
{
	/**
	 * 代理的对象
	 *
	 * @var object $_shoes
	 */
	private $_shoes;

	/**
	 * 找哪个代理办事
	 *
	 * @var string $_shoesType
	 */
	private $_shoesType;

	/**
	 * 构造方法
	 *
	 * @param string $shoesType
	 */
	public function __construct($shoesType)
	{
		$this->_shoesType = $shoesType;
	}

	/**
	 * 代理类叫代理对象干活
	 *
	 * @return void
	 */
	public function product()
	{
		switch ($this->_shoesType) {
			case 'sport':
				echo "==代理还可以偷点工减点料".PHP_EOL;
				$this->_shoes = new ShoesSport();
				break;
			case 'skateboard':
				echo "==代理还可以偷点工减点料".PHP_EOL;
				$this->_shoes = new ShoesSkateboard();
				break;

			default:
				throw new Exception("shoes type is not available", 404);
				break;
		}
		$this->_shoes->product();
	}
}

/**
 * 运动鞋实体
 */
class ShoesSport implements ShoesInterface
{
  public function product()
  {
    echo "==生产一双球鞋".PHP_EOL;
  }
}

/**
 * 滑板鞋实体
 */
class ShoesSkateboard implements ShoesInterface
{
  public function product()
  {
    echo "==生产一滑板鞋".PHP_EOL;
  }
}



try {
	echo "未加代理之前：".PHP_EOL;
	// 生产运动鞋
	$shoesSport = new ShoesSport();
	$shoesSport->product();

	echo "加代理：".PHP_EOL;
	// 把运动鞋产品线外包给代工厂
	$proxy = new Proxy('sport');
	// 代工厂生产运动鞋
	$proxy->product();
} catch (\Exception $e) {
	echo $e->getMessage();
}
