<?php
//Shared Memory Functions

/**
 * shmop_open(int $key , string $flags , int $mode , int $size)
 * $key 共享内存的key
 * $flags 的值有以下几种
 * a : 创建一个只读的共享内存区。
 * c : 如果共享内存区已存在，则打开该共享内存区，并尝试读写。否则新建共享内存区
 * w ： 创建一个读写共享内存区
 * n : 创建一个共享内存区，如果已存在，则返回失败
 *
 * $mode 读写权限。如0755 0644 等
 * $size 申请共享内存区的大小
 */

/**
 * shmop_read( resource $shmid , int $start , int $count)
 * 将从共享内存块中读取数据
 * $shmid 共享内存id，资源类型
 * $start 从共享内存的那个字节开始读起
 * $count 一次读取多少个字节。
 * 如果count值小于发送的信息长度，则信息会被截断。
 */

/**
 * shmop_write(resource $shmid , string $data , int $offset)
 * 将数据写入共享内存块
 * $data 将要写入的数据
 * $offset 从共享内存块的那个位置开始写入。
 * 该函数的返回值是写入数据的长度。
 */

/**
 * shmop_size(resource $shmid);
 * 返回当前共享内存块，已经使用的大小
 */


/**
 * shmop_delete ( resource $shmid )
 * 删除一个共享内存块的,删除引用关系
 */

/**
 * shmop_close ( resource $shmid )
 * 关闭共享内存块
 * 要先使用shmop_delete 之后才能继续使用shmop_close
 */
