<?php

/**
 * 被观察者接口
 *
 * 需要实现附加观察者，删除观察者，通知观察者方法
 */
interface ObservableInterface
{
  /**
   * 附加观察者
   * @return void
   */
  public function attach(ObserverInterface $observer);

  /**
   * 解除观察者
   * @return void
   */
  public function detach(ObserverInterface $observer);

  /**
   * 通知观察者
   * @return void
   */
  public function notify();
}

/**
 * 被观察者实体类
 */
class Observable implements ObservableInterface{
   /**
   * 观察者们
   * @var array
   */
  private $_observers = [];

  /**
   * 被观察者名称
   * @var string
   */
  private $_name = '被观察者';

  /**
   * 魔术方法 __get
   * @param  string $name 属性名称
   * @return mixed       
   */
  public function __get($name='')
  {
    return $this->$name;
  }

  /**
   * 附加观察者
   * @return void
   */
  public function attach(ObserverInterface $observer){
    if (!in_array($observer, $this->_observers, true)) {
        $this->_observers[] = $observer;
      }
  }

  /**
   * 解除观察者
   * @return void
   */
  public function detach(ObserverInterface $observer){
      foreach ($this->_observers as $k=> $v) {
        if ($v === $observer) {
            unset($this->_observers[$k]);
        }
      }
  }

  /**
   * 通知观察者
   * @return void
   */
  public function notify(){
      foreach ($this->_observers as $v) {
        $v->doSomething($this);
      }
  }
}

/**
 * 观察者接口
 */
interface ObserverInterface
{
  /**
   * 行为
   * @return void
   */
  public function doSomething(ObservableInterface $observable);
}

/**
 * 观察者实体类示例1
 */
class ObserverExampleOne implements ObserverInterface
{
  /**
   * 行为
   * @return mixed
   */
  public function doSomething(ObservableInterface $observable)
  {
    echo $observable->_name . "通知了观察者1 ".PHP_EOL;
  }
}

/**
 * 观察者实体类示例2
 */
class ObserverExampleTwo implements ObserverInterface
{
  /**
   * 行为
   * @return mixed
   */
  public function doSomething(ObservableInterface $observable)
  {
    echo $observable->_name . "通知了观察者2 ".PHP_EOL;
  }
}

// 注册一个被观察者对象
$observable = new Observable();
// 注册观察者们
$observerExampleOne = new ObserverExampleOne();
$observerExampleTwo = new ObserverExampleTwo();

// 附加观察者
$observable->attach($observerExampleOne);
$observable->attach($observerExampleTwo);

// 被观察者通知观察者们
$observable->notify();