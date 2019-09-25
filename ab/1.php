<?php
/**
 * ab -c500 -n100000 -k http://127.0.0.1:9501/
 */
/**
 * 服务器性能参数
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



/*
2核4G

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


Server Software:        Hyperf
Server Hostname:        127.0.0.1
Server Port:            9501

Document Path:          /
Document Length:        42 bytes

Concurrency Level:      500
Time taken for tests:   5.314 seconds
Complete requests:      100000
Failed requests:        0
Write errors:           0
Keep-Alive requests:    100000
Total transferred:      19000000 bytes
HTML transferred:       4200000 bytes
Requests per second:    18818.11 [#/sec] (mean)
Time per request:       26.570 [ms] (mean)
Time per request:       0.053 [ms] (mean, across all concurrent requests)
Transfer rate:          3491.64 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    3  56.8      0    1007
Processing:     1   23  12.8     23     256
Waiting:        1   23  12.8     23     256
Total:          1   26  63.2     23    1263

Percentage of the requests served within a certain time (ms)
  50%     23
  66%     27
  75%     30
  80%     32
  90%     36
  95%     40
  98%     45
  99%     51
 100%   1263 (longest request)
*/

/*
2CPU 4核 4G

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


Server Software:        Hyperf
Server Hostname:        127.0.0.1
Server Port:            9501

Document Path:          /
Document Length:        42 bytes

Concurrency Level:      500
Time taken for tests:   4.079 seconds
Complete requests:      100000
Failed requests:        0
Write errors:           0
Keep-Alive requests:    100000
Total transferred:      19000000 bytes
HTML transferred:       4200000 bytes
Requests per second:    24516.45 [#/sec] (mean)
Time per request:       20.394 [ms] (mean)
Time per request:       0.041 [ms] (mean, across all concurrent requests)
Transfer rate:          4548.95 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   2.2      0      37
Processing:    10   20   2.4     20      36
Waiting:        2   20   2.4     20      36
Total:         10   20   3.3     20      59

Percentage of the requests served within a certain time (ms)
  50%     20
  66%     21
  75%     21
  80%     22
  90%     23
  95%     25
  98%     27
  99%     29
 100%     59 (longest request)
*/

/*
1CPU 4核 4G

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


Server Software:        Hyperf
Server Hostname:        127.0.0.1
Server Port:            9501

Document Path:          /
Document Length:        42 bytes

Concurrency Level:      500
Time taken for tests:   2.975 seconds
Complete requests:      100000
Failed requests:        0
Write errors:           0
Keep-Alive requests:    100000
Total transferred:      19000000 bytes
HTML transferred:       4200000 bytes
Requests per second:    33611.57 [#/sec] (mean)
Time per request:       14.876 [ms] (mean)
Time per request:       0.030 [ms] (mean, across all concurrent requests)
Transfer rate:          6236.52 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   1.2      0      26
Processing:     1   15   6.4     14      49
Waiting:        1   15   6.4     14      49
Total:          1   15   6.5     14      49

Percentage of the requests served within a certain time (ms)
  50%     14
  66%     16
  75%     18
  80%     19
  90%     23
  95%     27
  98%     31
  99%     34
 100%     49 (longest request)

*/

/*
1CPU 4核 6G

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


Server Software:        Hyperf
Server Hostname:        127.0.0.1
Server Port:            9501

Document Path:          /
Document Length:        42 bytes

Concurrency Level:      500
Time taken for tests:   2.941 seconds
Complete requests:      100000
Failed requests:        0
Write errors:           0
Keep-Alive requests:    100000
Total transferred:      19000000 bytes
HTML transferred:       4200000 bytes
Requests per second:    34002.58 [#/sec] (mean)
Time per request:       14.705 [ms] (mean)
Time per request:       0.029 [ms] (mean, across all concurrent requests)
Transfer rate:          6309.07 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   1.0      0      20
Processing:     0   15   6.5     14      86
Waiting:        0   15   6.5     14      86
Total:          0   15   6.6     14      86

Percentage of the requests served within a certain time (ms)
  50%     14
  66%     16
  75%     18
  80%     19
  90%     23
  95%     26
  98%     29
  99%     33
 100%     86 (longest request)

*/

/*
1CPU 6核 4G

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


Server Software:        Hyperf
Server Hostname:        127.0.0.1
Server Port:            9501

Document Path:          /
Document Length:        42 bytes

Concurrency Level:      500
Time taken for tests:   2.498 seconds
Complete requests:      100000
Failed requests:        0
Write errors:           0
Keep-Alive requests:    100000
Total transferred:      19000000 bytes
HTML transferred:       4200000 bytes
Requests per second:    40029.94 [#/sec] (mean)
Time per request:       12.491 [ms] (mean)
Time per request:       0.025 [ms] (mean, across all concurrent requests)
Transfer rate:          7427.43 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   1.1      0      21
Processing:     0   12   6.6     11      81
Waiting:        0   12   6.6     11      81
Total:          0   12   6.6     11      81

Percentage of the requests served within a certain time (ms)
  50%     11
  66%     14
  75%     16
  80%     17
  90%     20
  95%     23
  98%     27
  99%     31
 100%     81 (longest request)
*/

/*
2CPU 8核 6G
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


Server Software:        Hyperf
Server Hostname:        127.0.0.1
Server Port:            9501

Document Path:          /
Document Length:        42 bytes

Concurrency Level:      2000
Time taken for tests:   2.216 seconds
Complete requests:      100000
Failed requests:        0
Write errors:           0
Keep-Alive requests:    100000
Total transferred:      19000000 bytes
HTML transferred:       4200000 bytes
Requests per second:    45127.23 [#/sec] (mean)
Time per request:       44.319 [ms] (mean)
Time per request:       0.022 [ms] (mean, across all concurrent requests)
Transfer rate:          8373.22 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    1  10.0      0      77
Processing:     4   42  17.2     39     111
Waiting:        1   42  17.2     39     111
Total:          4   43  20.5     40     143

Percentage of the requests served within a certain time (ms)
  50%     40
  66%     47
  75%     53
  80%     57
  90%     70
  95%     80
  98%    102
  99%    121
 100%    143 (longest request)

*/