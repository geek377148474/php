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
                $files[] = $filename;
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
            $herf .= sprintf('<li><a href="%s/%s">%s. %s</a></li>', $prefix, $value, $key, $value);
        }
        return $herf;
    }
}