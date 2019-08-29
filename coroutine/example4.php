<?php
go(function() {
    go(function () {
        co::sleep(6.0);
        go(function () {
            co::sleep(3.0);
            echo "co[3] end\n";
        });#3
        echo "co[2] end\n";
    });#2

    co::sleep(2.0);
    echo "co[1] end\n";
});#1