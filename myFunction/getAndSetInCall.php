<?php

class AAA{
    public function __call($method, $args){
        if (substr($method, 0, 3) === 'set') {
            $name = strtolower(substr($method, 3));
            $this->$name = $args[0];
            return $this;
        }
        if (substr($method, 0, 3) === 'get') {
            $name = strtolower(substr($method, 3));
            return $this->$name;
        }

        throw new \Exception('undefine method '.$method);
    }
}

$aaa = new AAA();
$aaa->setId('1');
echo $aaa->getId();