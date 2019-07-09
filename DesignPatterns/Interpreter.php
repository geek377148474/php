<?php

class SqlInterpreter
{

    /**
     * 表明
     *
     * @var [type]
     */
    private $_tableName;
    /**
     * 当前类的实例
     *
     * @var [type]
     */
    private static $_instance;

    public static function db($tableName): object
    {
        // 单例
        if (!self::$_instance instanceof self) {
            self::$_instance = new self();
        }
        // 更新实例表名
        self::$_instance->_setTableName($tableName);
        // 返回实例
        return self::$_instance;
    }

    /**
     * 设置表名
     *
     * @return void
     */
    private function _setTableName($tableName)
    {
        $this->_tableName = $tableName;
    }

    public function _sqlImplode(array $data, $type = 'insert'): string
    {
        if (empty($data)) {
            throw new \Exception("argument data is null");
        }
        if ($type != 'insert') {
            $string = '';
            $count = count($data);
            array_walk($data, function ($v, $k) use (&$string, &$count) {
                $count--;
                if ($count===0) {
                    $string .= "`{$k}` = `{$v}`";
                }else{
                    $string .= "`{$k}` = `{$v}` AND";
                }
            });
            return $string;
        }
        $string = '`';
        $string .= implode('`,`', $data);
        $string .= '`';
        return $string;
    }

    /**
     * 插入一条数据
     *
     * @param array $data
     * @return string
     */
    public function insert(array $data): string
    {
        $keys = array_keys($data);
        $values = array_values($data);
        $fieldString = $this->_sqlImplode($keys);
        $valueString = $this->_sqlImplode($values);
        $sql = "INSERT INTO `{$this->_tableName}` ({$fieldString}) VALUES ({$valueString})";
        return $sql;
    }

    /**
     * 删除一行数据
     *
     * @param array $data
     * @return string
     */
    public function delete(array $data): string
    {
        $where = $this->_sqlImplode($data, 'delete');
        $sql = "DELETE FROM `{$this->_tableName}` WHERE {$where}";
        return $sql;
    }

    /**
     * 更新一行数据
     *
     * @return void
     */
    public function update(array $data): string
    {
        $set = $this->_sqlImplode($data, 'update');
        $sql = "UPDATE `{$this->_tableName}` SET {$set}";
        return $sql;
    }

    /**
     * 查找一行数据
     *
     * @return void
     */
    public function find(array $data): string
    {
        $find = $this->_sqlImplode($data, 'find');
        $sql = "SELECT * FROM `{$this->_tableName}` WHERE {$find}";
        return $sql;
    }
}

try {
    //增加数据
    echo SqlInterpreter::db('user')->insert([
        'nickname' => 'tigerb',
        'mobile'   => '1366666666',
        'password' => '123456'
    ]);
    echo PHP_EOL;

    //删除数据
    echo SqlInterpreter::db('user')->delete([
        'nickname' => 'tigerb',
        'mobile'   => '1366666666',
    ]);
    echo PHP_EOL;

    //修改数据
    echo SqlInterpreter::db('member')->update([
        'id'       => '1',
        'nickname' => 'tigerbcode'
    ]);
    echo PHP_EOL;

    //查询数据
    echo SqlInterpreter::db('member')->find([
        'mobile'   => '1366666666',
    ]);
    echo PHP_EOL;
} catch (\Exception $e) {
    echo 'error:' . $e->getMessage();
}
