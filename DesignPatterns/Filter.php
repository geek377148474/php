<?php

/**
 * 过滤接口
 */
interface FilterInterface
{
    /**
     * 过滤方法
     *
     * @param  SportsMan $person 运动员
     * @return mixed
     */
    public function filter(array $person);
}

class FilterSportType
{
    /**
     * 按照本运动项目过滤
     */
    private $_sportType = '';

    /**
     * 构造函数
     * 
     * @param string $sportType 指定过滤类型
     */
    public function __construct($sportType)
    {
        $this->_sportType = $sportType;
    }

    /**
     * 过滤方法
     *
     * @param array $person 运动员对象的集合
     * @return array 按照本运动项目过滤后的集合
     */
    public function filter($person)
    {
        foreach ($person as $k => $v) {
            if ($v->sportType === $this->_sportType) {
                $personsFilter[] = $v;
            }
        }
        return $personsFilter;
    }
}

/**
 * 按性别过滤实体
 */
class FilterGender implements FilterInterface
{
    /**
     * 按照本性别过滤
     * @var string
     */
    private $_gender = '';

    /**
     * 构造函数
     * @param string $gender
     */
    public function __construct($gender = '')
    {
        $this->_gender = $gender;
    }

    /**
     * 过滤方法
     *
     * @param  array $persons 运动员集合
     * @return mixed
     */
    public function filter(array $persons)
    {
        foreach ($persons as $k => $v) {
            if ($v->gender === $this->_gender) {
                $personsFilter[] = $persons[$k];
            }
        }
        return $personsFilter;
    }
}

/**
 * 按运动项目过滤实体
 */
class SportsPerson
{
    /**
     * 性别
     * @var string
     */
    private $_gender = '';

    /**
     * 按照本运动项目过滤
     * @var string
     */
    private $_sportType = '';

    /**
     * 构造函数
     * @param string $gender
     * @param string $sportType
     */
    public function __construct($gender = '', $sportType = '')
    {
        $this->_gender = $gender;
        $this->_sportType = $sportType;
    }

    /**
     * 魔法函数
     * @param  string $value
     * @return mixed
     */
    public function __get($value = '')
    {
        $value = '_' . $value;
        return $this->$value;
    }
}

try {
    // 定义一组运动员
    $persons = [];
    $persons[] = new SportsPerson('male', 'basketball');
    $persons[] = new SportsPerson('female', 'basketball');
    $persons[] = new SportsPerson('male', 'football');
    $persons[] = new SportsPerson('female', 'football');
    $persons[] = new SportsPerson('male', 'swim');
    $persons[] = new SportsPerson('female', 'swim');

    // 按过滤男性
    $filterGender = new FilterGender('male');
    dump($filterGender->filter($persons));
    // 过滤运动项目篮球
    $filterSportType = new FilterSportType('basketball');
    dump($filterSportType->filter($persons));
} catch (\Exception $e) {
    echo $e->getMessage();
}
