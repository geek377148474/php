<?php
// ftok() 函数将一个文件和描述符转成一个唯一的id
$shm_key = ftok(__FILE__, 't');
dump($shm_key);
$shm_id = shmop_open($shm_key, "c", 0655, 1024);
shmop_write($shm_id, "Hello world" . PHP_EOL, 0);
$data = shmop_read($shm_id, 0, 100);
dump($data);
shmop_delete($shm_id);
shmop_close($shm_id);
