<?php
//1.开启xhprof
xhprof_enable();

//2.你需要分析的代码
for($i=1;$i<1000;$i++){
    if($i%100 == 0){
        echo  $i;
        echo "<br>";
    }
}


//3.关闭xhprof,收集数据
$xhprof_data = xhprof_disable();
include_once './xhprof/xhprof_lib/utils/xhprof_lib.php';
include_once './xhprof/xhprof_lib/utils/xhprof_runs.php';
$xhprof_runs = new XHProfRuns_Default();
$run_id = $xhprof_runs->save_run($xhprof_data, "xhprof_test");

echo "<br>";
echo  $run_id;die;
//将run_id保存起来或者随代码一起输出
# if (run_id == '5d2d3374633bc') then
# curl -S http://www.php.com/xhprof/xhprof/xhprof_html/index.php?run=5d2d3374633bc&source=xhprof_test

/*
|--------------------------------------------------------------------------
| 在框架的使用
|--------------------------------------------------------------------------
|
|
*/
// ini_set('xhprof.output_dir',dirname(__DIR__).'/xhprof_save_dir');
// include_once $xhprof_lib_dir;
// include_once $xhprof_runs_dir;
//
// HPROF_FLAGS_NO_BUILTINS 跳过所有内置（内部）函数。
// XHPROF_FLAGS_CPU 输出的性能数据中添加 CPU 数据。
// XHPROF_FLAGS_MEMORY 输出的性能数据中添加内存数据。
//
// xhprof_enable(XHPROF_FLAGS_MEMORY );
// 在程序结束后收集数据
// register_shutdown_function(function() {
//    $xhprof_data        = xhprof_disable();
//    //让数据收集程序在后台运行
//    if (function_exists('fastcgi_finish_request')) {
//        fastcgi_finish_request();
//    }
//    //保存
//    $xhprof_runs = new XHProfRuns_Default();
//    $xhprof_runs->save_run($xhprof_data, "xhprof_crm");
// });

// xhprof/xhprof_html/index.php
// ini_set('xhprof.output_dir',dirname(dirname(dirname(__DIR__))).'/xhprof_save_dir');