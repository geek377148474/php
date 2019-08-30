<?php
/**
 * ab -c500 -n100000 -k http://127.0.0.1:9501/
 */
/**
 * 服务器性能参数
 * 2G4核
 */
/*
This is ApacheBench, Version 2.3 <$Revision: 1430300 $>
Copyright 1996 Adam Twiss, Zeus Technology Ltd, http://www.zeustech.net/
Licensed to The Apache Software Foundation, http://www.apache.org/

Benchmarking 127.0.0.1 (be patient)
Completed 10000 requests
Completed 20000 requests
Completed 30000 requests
Completed 40000 requests
Completed 50000 requests
Completed 60000 requests
Completed 70000 requests
Completed 80000 requests
Completed 90000 requests
Completed 100000 requests
Finished 100000 requests


Server Software:        Hyperf              # 服务器软件版本
Server Hostname:        127.0.0.1           # 请求的URL
Server Port:            9501                # 请求的端口号

Document Path:          /                   # 请求的服务器的路径
Document Length:        42 bytes            # 单个请求页面长度 单位是字节

Concurrency Level:      500                 # 并发数
Time taken for tests:   2.169 seconds       # 总耗时
Complete requests:      100000              # 总请求次数
Failed requests:        0                   # 失败的请求
Write errors:           0
Keep-Alive requests:    100000              # -k keep alive 下保持的请求数
Total transferred:      19000000 bytes      # 总共传输的字节数 包括http头信息
HTML transferred:       4200000 bytes       # 实际页面传递的字节数 body
Requests per second:    46100.01 [#/sec] (mean)                             # 每秒多少个请求
Time per request:       10.846 [ms] (mean)                                  # 平均每个用户等待多长时间
Time per request:       0.022 [ms] (mean, across all concurrent requests)   # 服务器平均用多长时间处理
Transfer rate:          8553.71 [Kbytes/sec] received                       # 每秒获取多少数据

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    3  53.5      0    1004
Processing:     0    7   7.6      6     217
Waiting:        0    7   7.6      6     217
Total:          0   10  57.6      6    1221

Percentage of the requests served within a certain time (ms)
  50%      6                                                                # 50%的用户的请求 6ms内返回
  66%      8
  75%      9
  80%     10
  90%     12
  95%     15
  98%     17
  99%     20
 100%   1221 (longest request)

*/

// 创建TCP连接的时间占比最大 超过8:2

/*
Connection Times 参数释义：

竖栏：
参数名称	含义	备注
Connect	创建TCP连接到服务器或者代理服务器所花费的时间	通常我们习惯设置Web服务器的Connection:keep-alive，防止重复建立连接，减少请求时间
Processing	写入缓冲区消耗+链路消耗+服务端消耗	-
Waiting	写入缓冲区消耗+链路消耗+服务端消耗+读取数据消耗	-
Total	总花费时间	-

横栏：
参数名称	含义
min	最小值
mean	平均值
median	中位数
max	最大值
*/