<?php

/**
 * 编辑器实体
 */
class Editor
{
    /**
     * 编辑器内容
     *
     * @var string $_content
     */
    private $_content;

    /**
     * 备忘录实体
     *
     * @var object $_memento
     */
    private $_memento;

    /**
     * 构造函数
     *
     * @param string $content
     */
    public function __construct($content = '')
    {
        $this->_content = $content;

        // 初始化内容
        $this->read();

        // 实例化备忘录实例
        $this->_memento = new Memento();

        $this->save($content);
    }

    /**
     * 读取当前内容
     *
     * @return void
     */
    public function read()
    {
        echo $this->_content . PHP_EOL;
    }

    /**
     * 输出当前内容
     *
     * @param [type] $content
     * @return void
     */
    public function write($content)
    {
        $this->_content .= $content;
        $this->read();
    }

    /**
     * 保存
     *
     * @return void
     */
    public function save()
    {
        $this->_memento->add(clone $this);
    }

    /**
     * 后退
     *
     * @return void
     */
    public function undo()
    {
        $undo = $this->_memento->undo();
        $this->_content = $undo->_content;
    }

    /**
     * 复原
     *
     * @return void
     */
    public function redo()
    {
        $redo = $this->_memento->redo();
        $this->_content = $redo->_content;
    }
}
/**
 * 备忘录实体
 */
class Memento
{
    /**
     * 备忘录栈 先进后出
     *
     * @var [type]
     */
    private $_mementoList = [];

    /**
     * 存储
     *
     * @return void
     */
    public function add($editor)
    {
        array_push($this->_mementoList, $editor);
    }

    /**
     * 返回编辑器实例上个状态
     *
     * @return void
     */
    public function undo()
    {
        return array_pop($this->_mementoList);
    }

    /**
     * 返回编辑器实例开始状态
     *
     * @return void
     */
    public function redo()
    {
        return array_shift($this->_mementoList);
    }
}

try {
    // 初始化一个编辑器并新建一个空文件
    $editor = new Editor('');

    // 写入一段文本
    $editor->write('hello php !');
    // 保存
    $editor->save();
    // 修改刚才的文本
    $editor->write(' no code no life !');
    // 撤销
    $editor->undo();
    $editor->read();
    // 再次修改并保存文本
    $editor->write(' life is a struggle !');
    $editor->save();
    // 重置
    $editor->redo();
    $editor->read();
} catch (\Exception $e) {
    echo 'error:' . $e->getMessage();
}
