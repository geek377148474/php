<?php
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
  function __get($name='')
  {
    $name = '_' . $name;
    return $this->$name;
  }

  /**
   * 抽象方法
   *
   * @return mixed
   */
  abstract function doSomthing($person);
}
/**
 * 鬼
 */
class NullPerson extends Person
{
    /**
     * 空方法
     *
     * @return mixed
     */
    function doSomthing($person)
    {
        echo "难道这是个鬼吗............ \n";
    }
}
/**
 * 引发学生“暴动”的老师
 */
class Teacher extends Person
{
  /**
   * 老师提问
   *
   * @return mixed
   */
  function doSomthing($person)
  {
    if (!$person instanceof Student) {
      $person = new NullPerson('');
    }
    $person->doSomthing($this);
  }
}
/**
 * 学生
 */
class Student extends Person
{
  /**
   * 答题方法
   *
   * @return mixed
   */
  function doSomthing($person)
  {
    echo "老师‘{$person->name}’让学生‘{$this->name}’回答了一道题~ \n";
  }
}



try {
    //创建一个老师：路飞
    $teacher = new Teacher('路飞');

    // 创建学生
    $mc      = new Student('麦迪');
    $kobe    = new Student('科比');
    $paul    = new Student('保罗');

    // 老师提问
    $teacher->doSomthing($mc);
    $teacher->doSomthing($kobe);
    $teacher->doSomthing($paul);
    $teacher->doSomthing('小李'); // 提问了一个班级里不存在人名


} catch (\Exception $e) {
    echo 'error:' . $e->getMessage();
}
