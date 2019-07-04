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

class Folder
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
    private $_composite;

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
        unset($this->_composite);
    }
}
