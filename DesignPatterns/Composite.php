<?php

interface CompositeInterface
{
    /**
     * 增加一个节点对象
     *
     * @param CompositeInterface $composite
     * @return void
     */
    public function add(CompositeInterface $composite);

    /**
     * 删除一个节点对象
     *
     * @param CompositeInterface $composite
     * @return void
     */
    public function delete(CompositeInterface $composite);

    /**
     * 实体类要实现的方法
     *
     * @return void
     */
    public function operation();

    /**
     * 打印对象组合
     *
     * @return void
     */
    public function printComposite();
}

class Folder implements CompositeInterface
{
    /**
     * 名称
     * @var string
     */
    private $_name;

    /**
     * 对象组合
     * @var array
     */
    private $_composite = [];

    public function __construct($name)
    {
        $this->_name = $name;
    }

    /**
     * 魔术函数
     *
     * @param string $name
     * @return void
     */
    public function __get($name)
    {
        $name = '_' . $name;
        return $this->$name;
    }
    /**
     * 增加节点
     *
     * @param CompositeInterface $composite
     * @return void
     */
    public function add(CompositeInterface $composite)
    {
        if (in_array($composite, $this->_composite, true)) return;
        $this->_composite[] = $composite;
    }

    /**
     * 删除节点
     *
     * @param CompositeInterface $composite
     * @return void
     */
    public function delete(CompositeInterface $composite)
    {
        $key = array_search($composite, $this->_composite);
        if (!$key) {
            throw new \Exception('not found');
        }
        unset($this->_composite[$key]);
        $this->_composite = array_values($this->_composite);
    }

    /**
     * 打印对象组合
     *
     * @return void
     */
    public function printComposite()
    {
        foreach ($this->_composite as $v) {
            if ($v instanceof Folder) {
                echo 'dir:-----' . $v->name . '-----' . PHP_EOL;
                $v->printComposite();
                continue;
            }
            echo 'file:--'.$v->name.'--'.PHP_EOL;
        }
    }

    /**
     * 实体类要实现的方法
     *
     * @return mixed
     */
    public function operation()
    {
        return;
    }
}


class File implements CompositeInterface
{
    /**
     * 文件名称
     * @var string
     */
    private $_name;

    /**
     * 文件内容
     * @var array
     */
    private $_content;

    /**
     * 构造函数
     */
    public function __construct($name = '')
    {
        $this->_name = $name;
    }

    /**
     * 魔术方法
     *
     * @param string $name 属性名称
     * @return void
     */
    public function __get($name)
    {
        $name = '_' . $name;
        return $this->$name;
    }

    /**
     * 增加一个节点对象
     *
     * @return mixed
     */
    public function add(CompositeInterface $composite)
    {
        throw new Exception('not support', 500);
    }

    /**
     * 删除节点一个对象
     *
     * @return mixed
     */
    public function delete(CompositeInterface $composite)
    {
        throw new Exception('not support', 500);
    }

    /**
     * 打印对象组合.
     *
     * @return mixed
     */
    public function printComposite()
    {
        throw new Exception('not support', 500);
    }

    /**
     * 实体类要实现的方法.
     *
     * @return mixed
     */
    public function operation($operation = '', $content = '')
    {
        switch ($operation) {
            case 'read':
                echo $this->_content;
                break;
            case 'write':
                $this->_content .= $content;
                echo 'write success.';
                break;
            default:
                throw new Exception('not support', 500);
                break;
        }
    }
}


try {
    // 构建一个根目录
    $root = new Folder('根目录');

    // 根目录下添加一个test.php的文件和usr,mnt的文件夹
    $testFile = new File('test.php');
    $usr = new Folder('usr');
    $mnt = new Folder('mnt');
    $root->add($testFile);
    $root->add($usr);
    $root->add($mnt);
    $usr->add($testFile); // usr目录下加一个test.php的文件

    // 打印根目录文件夹节点
    $root->printComposite();
} catch (\Exception $e) {
    echo $e->getMessage();
}
