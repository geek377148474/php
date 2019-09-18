<?php

class AAA{
    function __toString(){
        return serialize($this);
    }
}

echo md5(new AAA());