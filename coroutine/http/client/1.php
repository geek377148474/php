<?php

namespace coroutine\http\client;

use Swoole\Coroutine as Co;
use Swoole\Coroutine\Http\Client;

/*
客户端仅实现核心的功能，实际项目建议使用 Saber

构造方法
function Swoole\Coroutine\Http\Client->__construct(string $host, int port, bool $ssl = false);
$host 目标服务器主机地址，可以为IP或域名，底层自动进行域名解析
$port 目标服务器的端口，一般http为80，https为443
$ssl 是否启用SSL/TLS隧道加密，如果目标服务器是https必须设置$ssl参数为true
*/
Co::create(function(){
    $cli = new Client('127.0.0.1', 80);
    $cli->setHeaders([
        'Host' => "www.php.com",
        "User-Agent" => 'Chrome/49.0.2587.3',
        'Accept' => 'text/html,application/xhtml+xml,application/xml',
        'Accept-Encoding' => 'gzip',
    ]);
/*
Coroutine\Http\Client->set
设置客户端参数，此方法与Swoole\Client->set接收的参数完全一致，可参考 Swoole\Client->set 方法的文档。

除了设置Socket的参数之外，Swoole\Coroutine\Http\Client 额外增加了一些选项，来控制Http和WebSocket客户端。

超时控制
设置timeout选项，启用Http请求超时检测。单位为秒，最小粒度支持毫秒。
$http->set(['timeout' => 3.0]);
连接超时或被服务器关闭连接，statusCode将设置为-1
在约定的时间内服务器未返回响应，请求超时，statusCode将设置为-2
请求超时后底层会自动切断连接
设置为-1表示永不超时，底层将不会添加超时检测的定时器

keep_alive
设置keep_alive选项，启用或关闭Http长连接。
$http->set(['keep_alive' => false]);
websocket_mask
由于RFC规定, v4.4.0后此配置默认开启, 但会导致性能损耗, 如服务器端无强制要求可以设置false关闭

WebSocket客户端启用或关闭掩码。默认为关闭。启用后会对WebSocket客户端发送的数据使用掩码进行数据转换。

$http->set(['websocket_mask' => true]);
*/
    $cli->set([ 'timeout' => 1]);
    $cli->get('/');
    echo $cli->body;
    $cli->close();
});

/*
Saber - 人性化的协程HTTP客户端封装库
开发者可使用已封装的协程HTTP客户端Saber

基于Swoole协程Client开发
人性化使用风格, ajax.js/axios.js/requests.py用户福音, 同时支持PSR风格操作
浏览器级别完备的Cookie管理机制, 完美适配爬虫/API代理应用
请求/响应/异常拦截器
多请求并发, 并发重定向优化
连接池, 自动化复用长连接
通道池(Chan): 最大连接数限制+无阻塞
HTTPS连接, CA证书自动化支持
HTTP/Socks5 Proxy支持
WebSocket连接支持
毫秒级超时定时器
自动化 编码请求/解析响应 数据
响应报文自动编码转换
异步超大文件上传/下载, 断点重传
自动重试机制
单次并发数控制
多模式/超细粒度异常处理机制
*/