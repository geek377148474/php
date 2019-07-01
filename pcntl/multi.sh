#!/bin/bash
 
for((i=1;i<=8;i++))
do    
    /usr/local/bin/php multiprocessTest.php &
done
 
wait