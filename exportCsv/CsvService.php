<?php


class CsvService
{
    public function __invoke($callback,$filename,$title){
        $start = time();
        set_time_limit(0);
        $fp = fopen($filename.'.csv', 'w');
        fputcsv($fp,$title);

        $res = $callback(); // 返回list、count
        $count = $res['count'];
        $per=100;
        $pageCount = ceil($count/$per);
        for($i=1;$i<=$pageCount;$i++){
            $res = $callback($pageCount,$per);
            $list = $res['list'];
            foreach ($list as $k => $v) {
                fputcsv($fp, $v);
            }
        }
        fclose($fp);
        $end = time();
        $time = $end - $start;
        echo '导出花费时间：'.$time;
    }
}