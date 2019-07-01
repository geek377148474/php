<?php
$key = 0x4337b700;
$size = 256;
$shmid = @shmop_open($key, 'w', 0644, $size);
if ($shmid === FALSE) {
    exit('shmop_open error!');
}

$data = unpack('a*', shmop_read($shmid, 0, 256));
if ($data === FALSE) {
    exit('shmop_read error!');
}
// 不加shmop_delete，仅仅关闭共享内存块，并没有删除
shmop_delete($shmid);
@shmop_close($shmid);

exit($data[1]);
