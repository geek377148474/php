<?php

/**
 * 服务中心
 */
class RpcServer
{
    protected $tcp_server;
    public function __construct($ip,$port)
    {
        //创建一个tcp服务,用于监听客户端数据
        //创建一个tcp socket服务
        $errno='';
        $errstr='';
        $this->tcp_server = stream_socket_server("tcp://{$ip}:{$port}", $errno, $errstr);
        if (!$this->tcp_server) {
            exit("{$errno} : {$errstr} \n");
        }
        echo "服务创建成功\n";
        while (true) {
            $client = stream_socket_accept($this->tcp_server);
            if ($client) {
                echo "客户端连接成功\n";
                //这里为了简单，我们一次性读取
                $buf = fread($client, 2048);
                echo "客户端请求数据为:{$buf}\n";
                //可以增加客户端数据包验证,ip验证等
                $data = json_decode($buf,1);
                //自行定义数据包格式,这里是用json
                //这儿需要验证json
                $class_name = $data['service'];
                $action_name = $data['action'];
                $parameter = $data['args'];
                //这里需要验证文件,类,方法是否存在
                include_once $class_name.".php";
                $class = new $class_name();
                $rev = $class->$action_name($parameter);
                echo "调用结果:{$rev}\n";
                //发送调用结果给客户端
                fwrite($client, $rev);
                //关闭客户端
                fclose($client);
            }
        }
    }
    public function __destruct() {
        fclose($this->tcp_server);
    }
 
}