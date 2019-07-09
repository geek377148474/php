<?php
/**
 * 农民类
 */
class Farmer
{
    /**
     * 当前季节
     *
     * @var string
     */
    private $_currentSeason = '';

    /**
     * 季节
     * @var string
     */
    private $_season = [
        'spring',
        'summer',
        'autumn',
        'winter'
    ];

    /**
     * 状态
     * @var object
     */
    private $_state;

    /**
     * 设置状态
     * @param string $currentSeason 状态名
     */
    private function setState($currentSeason)
    {
        if ($currentSeason === 'spring') {
            $this->_state = new FarmSpring();
            return;
        }
        if ($currentSeason === 'summer') {
            $this->_state = new FarmSummer();
            return;
        }
        if ($currentSeason === 'autumn') {
            $this->_state = new FarmAutumn();
            return;
        }
        if ($currentSeason === 'winter') {
            $this->_state = new FarmWinter();
            return;
        }
        throw new \Exception('not found');
    }

    /**
     * 设置下个季节状态
     *
     * @return void
     */
    public function nextSeason()
    {
        $nowKey = (int) array_search($this->_currentSeason, $this->_season);
        if ($nowKey < 3) {
            $nextSeason = $this->_season[$nowKey + 1];
        } else {
            $nextSeason = $this->_season[0];
        }
        $this->_currentSeason = $nextSeason;
        $this->setState($this->_currentSeason);
    }

    /**
     * 设置初始状态
     *
     * @param string $season
     */
    public function __construct($season = 'spring')
    {
        $this->_currentSeason = $season;
        $this->setState($this->_currentSeason);
    }

    /**
     * 种植
     *
     * @return void
     */
    public function grow()
    {
        $this->_state->grow();
    }

    /**
     * 收货
     *
     * @return void
     */
    public function harvest(){
        $this->_state->harvest();
        $this->nextSeason();
    }
}
/**
 * 农耕接口
 */
interface Farm
{
    public function grow();
    public function harvest();
}
/**
 * 春耕
 */
class FarmSpring implements Farm
{
  /**
   * 作物名称
   * @var string
   */
  private $_name = '玉米';

  /**
   * 种植
   *
   * @return string
   */
  function grow()
  {
    echo "种植了一片 {$this->_name} \n";
  }

  /**
   * 收割
   *
   * @return string
   */
  function harvest()
  {
    echo "收获了一片 {$this->_name} \n";
  }
}
/**
 * 夏耕
 */
class FarmSummer implements Farm
{
  /**
   * 作物名称
   * @var string
   */
  private $_name = '黄瓜';

  /**
   * 种植
   *
   * @return string
   */
  function grow()
  {
    echo "种植了一片 {$this->_name} \n";
  }

  /**
   * 收割
   *
   * @return string
   */
  function harvest()
  {
    echo "收获了一片 {$this->_name} \n";
  }
}
/**
 * 秋耕
 */
class FarmAutumn implements Farm
{
  /**
   * 作物名称
   * @var string
   */
  private $_name = '白菜';

  /**
   * 种植
   *
   * @return string
   */
  function grow()
  {
    echo "种植了一片 {$this->_name} \n";
  }

  /**
   * 收割
   *
   * @return string
   */
  function harvest()
  {
    echo "收获了一片 {$this->_name} \n";
  }
}
/**
 * 冬耕
 */
class FarmWinter implements Farm
{
  /**
   * 作物名称
   * @var string
   */
  private $_name = '菠菜';

  /**
   * 种植
   *
   * @return string
   */
  function grow()
  {
    echo "种植了一片 {$this->_name} \n";
  }

  /**
   * 收割
   *
   * @return string
   */
  function harvest()
  {
    echo "收获了一片 {$this->_name} \n";
  }
}

try {
    // 初始化一个农民
    $farmer = new Farmer();

    // 春季
    $farmer->grow();
    $farmer->harvest();
    // 夏季
    $farmer->grow();
    $farmer->harvest();
    // 秋季
    $farmer->grow();
    $farmer->harvest();
    // 冬季
    $farmer->grow();
    $farmer->harvest();
} catch (\Exception $e) {
    echo 'error:' . $e->getMessage();
}
