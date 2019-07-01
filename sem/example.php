<?php
// 创建一个共享内存
$shm_id = shm_attach($key, 1024, 0666);

// 设置一个值
$shar_key = 1;
shm_put_var($shm_id, $shar_key, 'test');

// 删除一个 key
shm_remove_var($shm_id, $shar_key);

// 获取一个值
$value = shm_get_var($shm_id,  $shar_key);

// 检测一个 key 是否存在
shm_has_var($shm_id,  $shar_key);

// 从系统中移除一个共享内存
shm_remove($shm_id);

// 关闭和共享内存的连接
shm_detach($shm_id);
