<?php

/**
 *
 */
class outerImpl extends IteratorIterator
{

    public function current()
    {
        # code...
        return parent::current() . '_tail';
    }
    public function key()
    {
        return 'pre_' . parent::key();
    }
}

$array = ['value1', 'value2', 'value3', 'value4'];

$outerObj = new outerImpl(new ArrayIterator($array));

foreach ($outerObj as $key => $value) {
    # code...
    echo '++' . $key . '-' . $value . PHP_EOL;
}
