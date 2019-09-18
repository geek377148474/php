<?php
/*
vmware磁盘扩容
设置->硬件->硬盘->扩展
先实现卷扩容
后实现文件系统扩容

1.列出磁盘信息 据此得知新建分区将是sda3
fdisk -l

2.使用fdisk /dev/sda进入菜单项，m：列出菜单，p：列出分区表，n：增加分区，w：保存并退出
fdisk /dev/sda

3.reboot 重开机

4.
df -h # 挂载前的分区情况
fdisk -l # 列出磁盘信息

5.以ext3形式格式化sda3
mkfs.ext3 /dev/sda3

(6.挂载分区) 
cd /
mkdir /newdisk               # 准备一个文件目录用于挂载
mount /dev/sda3 /newdisk     # 挂载分区到   /newdisk
df -h                        # 挂载后分区情况

(7.加载分区)  修改vi /etc/fstab  分区表文件， 设置开机自动加载
vi /etc/fstab
/dev/sda3   /newdisk     ext3    defaults    0   0
# 至此，新增加的磁盘空间容量，即可在diske上体现，并且重新开机自动mount该分区，追加磁盘空间的工作完毕

选了67就不用89

8.将这个分区的容量分一部分到根目录所在的磁盘
添加新LVM到已有的LVM组，实现扩容
(umount /dev/sda3)
lvm　　　　　　　　　　　　　　　　　　                # 进入lvm管理
lvm>pvcreate /dev/sda3　　　　　　　　　             # 这是初始化刚才的分区，必须的
lvm>vgextend centos /dev/sda3              　　　   # 将初始化过的分区加入到虚拟卷组centos
lvm>lvextend -L +29.9G /dev/mapper/centos-root　　  # 扩展已有卷的容量（29.9G这个数字在后面解释）
lvm>pvdisplay　　　　　　　　　　　　　　             # 查看卷容量，这时你会看到一个很大的卷了
lvm>quit　　　　　　　　　　　　　　　　　             # 退出
                                                    # +29.9G 空间不能全被LVM用 lvextend试探29.9G, 29.8G ... 直到不报错

9.xfs_growfs /dev/mapper/centos-root        # 执行调整

10.df -h