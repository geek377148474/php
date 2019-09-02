<?php

/**
 * 服务调用端
 */

//服务节点注册(直接模拟注册过程)
$service = [
    'Login' => [
        [
            'node' => 'node1',
            'ip'   => '127.0.0.1',
            'port' => '9501',
        ],
        [
            'node' => 'node2',
            'ip'   => '127.0.0.1',
            'port' => '9601',
        ],
    ]
];
 
//直接调用客户端请求服务端
$arr = [
    'service' => 'Login',
    'action'  => 'userLogin',
    'args'    => [
        'name'     => 'tioncico',
        'password' => '123456'
    ]
];

//根据请求服务名,获得服务节点(一个服务可以被多个服务器注册)
$node_array = $service[$arr['service']];
$node =$node_array[array_rand($node_array)];
echo "请求的服务节点为:{$node['node']}\n";
$fp = stream_socket_client("tcp://{$node['ip']}:{$node['port']}");
 
$sendStr = json_encode($arr);
 
fwrite($fp, $sendStr);
$data = fread($fp, 65533);
 
echo "服务端返回结果:{$data}\n";