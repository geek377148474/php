<?php
/**
 * 房屋中介
 */
class HouseMediator
{
  /**
   * 提供租房服务
   *
   * @param  Person $person 租客
   * @return Person
   */
  function rentHouse(Person $person)
  {
    // 初始化一个房东
    $landlord = new Landlord('小梅');
    // 租房子
    echo '通过房屋中介，' . $landlord->doSomthing($person);
  }
}

/**
 * 抽象类人
 */
abstract class Person
{
    /**
     * 名字
     * @var string
     */
    private $_name = '';

    /**
     * 构造函数
     */
    function __construct($name)
    {
        $this->_name = $name;
    }

    /**
     * 魔术方法
     * 读取私有属性
     *
     * @param  string $name 属性名称
     * @return mixed
     */
    function __get($name = '')
    {
        $name = '_' . $name;
        return $this->$name;
    }

    /**
     * 抽象方法
     *
     * @return mixed
     */
    abstract function doSomthing(Person $person);
}


/**
 * 租客
 */
class Tenant extends Person
{
    /**
     * 组间房子
     *
     * @return mixed
     */
    public function doSomthing(Person $person)
    {
        // 本来是之间找房东租房,但是茫茫人海错综复杂
        // 下面我们通过一家正规的房屋中介租房
        $houseMediator = new HouseMediator();
        $houseMediator->rentHouse($this);
    }
}

/**
 * 房东
 */
class Landlord extends Person
{
  /**
   * 租出去房子
   *
   * @return mixed
   */
  public function doSomthing(Person $person)
  {
    // 租出去闲置房子
    return "‘{$this->name}’租出去一件闲置房给‘{$person->name}’ ～ \n";
  }
}



try {
    // 初始化一个租客
    $tenant = new Tenant('小明');

    // 小明直接找小梅租房
    $landlord = new Landlord('小梅');
    echo $landlord->doSomthing($tenant);

    // 小明通过房屋中介租房
    // 初始化一个房屋中介
    $mediator = new HouseMediator();
    // 租房
    $mediator->rentHouse($tenant);
} catch (\Exception $e) {
    echo 'error:' . $e->getMessage();
}
