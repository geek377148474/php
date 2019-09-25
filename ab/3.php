<?php
/*


一、什么是高并发
定义：
    高并发(High Concurrency)是使用技术手段使系统可以并行处理很多请求。


关键指标：
-响应时间(Response Time)
-吞吐量(Throughput)
-每秒查询率QPS(Query Per Second)
-每秒事务处理量TPS(Transaction Per Second)
-同时在线用户数量


关键指标的维度：
-平均，如：小时平均、日平均、月平均
-Top百分数TP(Top Percentile)，如：TP50、TP90、TP99、TP4个9
-最大值
-趋势


「并发」由于在互联网架构中，已经从机器维度上升到了系统架构层面，所以和「并行」已经没有清晰的界限。「并」(同时)是其中的关键。由于「同时」会引发多久才叫同时的问题，将时间扩大，又根据不同业务关注点不同，引申出了引申指标。
引申指标：
-活跃用户数，如：日活DAU(Daily Active User)、月活MAU(Monthly Active Users)
-点击量PV(Page View)
-访问某站点的用户数UV(Unique Visitor)
-独立IP数IP(Internet Protocol)
-日单量

