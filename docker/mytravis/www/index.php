<?php
const DSN = "mysql:host=192.168.31.37:3307;dbname=test";
const USER_NAME = "root";
const PASSWORD = "123456";

! defined('DEBUG') && define('DEBUG', true);

if (DEBUG) {
    goto phpinfo;
}

// ========= mysql =========
try{
    $conn = new PDO(DSN,USER_NAME,PASSWORD);
    
    echo "=======连接数据库成功=======".PHP_EOL;
}catch (PDOException $e){
    echo "=======连接数据库失败=======".PHP_EOL;
    // echo $e->getMessage().PHP_EOL;
}finally{
    $conn = null;
    //   echo "关闭数据库连接";
}

echo '<br>';

// ========== redis =========
try{
    $redis = new Redis();
        //选择指定的redis数据库连接，默认端口号为6379
    $redis->connect('192.168.31.37', 6380);
    echo "=======连接redis成功=======".PHP_EOL;
}catch (RedisException $e){
    echo "=======连接redis失败=======".PHP_EOL;
    // echo $e->getMessage().PHP_EOL;
}finally{
    // $redis->close();
    //   echo "关闭数据库连接";
}

echo '<br>';

// =========== phpmyadmin
// =========== phpredisadmin

phpinfo:
echo phpinfo();