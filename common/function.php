<?php

/**
 * 提取对应注解
 *
 * @return void
 */
function getAnnotation($annotion) {
    // preg_match();
}


/**
 * 返回 获取$dir目录下所有文件 的array
 */
if (! function_exists('getDirFiles')) {
    function getDirFiles($dir, $exclude = []):array
    {
        $exclude = !is_array($exclude) ? array_slice(func_get_args(), 1) : $exclude;
        // 获取某目录下所有文件、目录名（不包括子目录下文件、目录名）
        $handler = opendir($dir);
        while (($filename = readdir($handler)) !== false) {
            // 务必使用!==，防止目录下出现类似文件名“0”等情况  
            if ($filename == "." || $filename == ".." || in_array($filename, $exclude)) continue;

            if(is_file($dir.DIRECTORY_SEPARATOR.$filename)) {
                $files[] = str_replace(WORK_DIR.DIRECTORY_SEPARATOR, '', $dir.DIRECTORY_SEPARATOR.$filename);
            }else{
                $files = array_merge($files ?? [], getDirFiles($dir.DIRECTORY_SEPARATOR.$filename));
            }
        }
        closedir($handler);
        return $files ?? [];
    }
}

/**
 * file to herf
 */
if (! function_exists('fileToHerf')) {
    function fileToHerf(array $file, $prefix)
    {
        if (empty($file)) return [];
        $herf = '';
        foreach ($file ?? [] as $key => $value) {
            $herf .= sprintf('<li><a href="%s'.DIRECTORY_SEPARATOR.'%s">%s. %s</a></li>', $prefix, $value, $key, $value);
        }
        return $herf;
    }
}

if (! function_exists('pp')) {
    function pp(...$args){
        echo '<pre>';
        var_dump($args);
        echo '</pre>';
    }
}

if (! function_exists('chooseDump')) {
    /**
     * 可设置多个循环 或多次调用的 程序中 选定条件 $condition 终止
     * 当然 $condition 可以是表达式 也可以是 调用的闭包(该闭包需要被调用并返回用于判断)
     */
    function chooseDump($condition, $data='dump your data here'){
        if ($condition) {
            \Doctrine\Common\Util\Debug::dump($data, 3);
            die;
        }
    };
}