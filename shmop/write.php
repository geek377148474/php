<?php
$key = 0x4337b700;
$size = 4096;
$shmid = @shmop_open($key, 'c', 0644, $size);
if ($shmid === FALSE) {
    exit('shmop_open error!');
}

$data = 'Hello Wrold';

$length = shmop_write($shmid, pack('a*', $data), 0);
if ($length === FALSE) {
    exit('shmop_write error!');
}

@shmop_close($shmid);

exit('succ');
