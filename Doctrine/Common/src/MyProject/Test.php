<?php

namespace MyProject;

class Test
{
    function __invoke(){
        echo 'ok';
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return 'ok';
    }
}