<?php

/**
 * 迭代器接口
 */
interface myIterator
{
    /**
     * 是否还有下一个
     *
     * @return boolean
     */
    public function hasNext();

    /**
     * 下一个
     *
     * @return object
     */
    public function next();

    /**
     * 当前
     *
     * @return mixed
     */
    public function current();

    /**
     * 当前索引
     *
     * @return mixed
     */
    public function index();
}
/**
 * 学校接口
 */
interface School
{
    /**
     * 获取迭代器
     *
     * @return mixed
     */
    public function getIterator();
}

/**
 * 老师迭代实体
 */
class TeacherIterator implements myIterator
{
    private $_index = 0;
    /**
     * 要迭代的对象
     *
     * @var [type]
     */
    public $_teachers;

    /**
     * 构造函数
     */
    public function __construct(School $school)
    {
        $this->_teachers = $school->teachers;
    }

    /**
     * 获取索引
     *
     * @return void
     */
    public function index()
    {
        echo $this->_index;
    }

    /**
     * 是否有下一个索引/下个索引索引号小于数量
     *
     * @return boolean
     */
    public function hasNext()
    {
        if ($this->_index + 1 < count($this->_teachers)) {
            return true;
        }
        return false;
    }

    /**
     * 指针指向下一个
     *
     * @return void
     */
    public function next()
    {
        if (!$this->hasNext()) {
            echo null;
            return false;;
        }
        $this->_index += 1;
        // echo $this->_teachers[$this->_index];
        return true;
    }

    /**
     * 获取当前指针指向的内容
     *
     * @return void
     */
    public function current()
    {
        echo $this->_teachers[$this->_index].PHP_EOL;
    }
}
/**
 * 学校实体
 */
class SchoolExperimental implements School
{

    /**
     * 老师集合
     * @var
     */
    private $_teachers = [];

    /**
     * 魔法方法
     *
     * @param  string $name 属性名称
     * @return mixed
     */
    public function __get($name = '')
    {
        $name = '_' . $name;
        return $this->$name;
    }
    
    /**
     * 获取迭代器
     *
     * @return mixed
     */
    public function getIterator()
    {
        return new TeacherIterator($this);
    }

    /**
     * 添加教师
     */
    public function addTeacher($teacher = '')
    {
        if (in_array($teacher, $this->_teachers)) {
            return;
        }
        array_push($this->_teachers, $teacher);
    }
}


try {
    // 初始化一个实验小学
    $experimental = new SchoolExperimental();
    // 添加老师
    $experimental->addTeacher('Griffin');
    $experimental->addTeacher('Curry');
    $experimental->addTeacher('Mc');
    $experimental->addTeacher('Kobe');
    $experimental->addTeacher('Rose');
    $experimental->addTeacher('Kd');

    // 获取教师迭代器
    $iterator = $experimental->getIterator();
    // 打印所有老师
    do {
        $iterator->current();
    } while ($iterator->next());
} catch (\Exception $e) {
    echo 'error:' . $e->getMessage();
}
