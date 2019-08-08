<?php

namespace annotation;

use mysql_xdevapi\Exception;

class format
{
    public $formatData=[];

    public function main($data)
    {
        $data = preg_replace('@\[pid.*?\]@', '', $data);
        preg_match_all('@.*\s>\s.*@', $data, $matches);
        foreach ($matches[0] as $v) {
            preg_match_all('@\s{4}@', $v, $match);
            $count = count($match[0]);
            $this->runInDepth($this->formatData, $count, $v);

        }

        return $this->formatData;
    }

    # 实现能往数组$arr的$end层push一个$key-$value
    private function runInDepth(&$arr, $end, $value, $key = false, $depth = 0)
    {
        if ($end == 0 && $depth==0) {
            throw new \Exception("\$end必须大于0");
        }
        $end -= $depth === 0 ? 1 : 0;
        if ($end === 0) {
            if (!$key) {
                $arr[] = $value;
            } else {
                $arr[$key] = $value;
            }
            return $arr;
        }
        $end--;
        $depth++;
        $tmp = end($arr);
        if (!is_array($tmp)) {
            if (!$key) {
                $arr[] = [$value];
            } else {
                $arr[] = [$key=>$value];
            }
            return $arr;
        }
        $tmpkey = array_search($tmp, $arr);
        $arr[$tmpkey] = $this->runInDepth($tmp, $end, $value, $key, $depth);
        return $arr;
    }
}