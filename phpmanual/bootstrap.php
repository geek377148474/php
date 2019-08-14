<?php

/**
 * 返回 获取$dir目录下所有文件 的array
 */
function getDirFiles($dir, $exclude=[]){
    $exclude = ! is_array($exclude) ? array_slice(func_get_args(),1) : $exclude;
    // 获取某目录下所有文件、目录名（不包括子目录下文件、目录名）  
    $handler = opendir($dir);  
    while (($filename = readdir($handler)) !== false) 
    {
        // 务必使用!==，防止目录下出现类似文件名“0”等情况  
        if ($filename !== "." && $filename !== "..") 
        {  
            if (in_array($filename, $exclude)){
                continue;
            }
            $files[] = $filename ;
        }  
    }
    closedir($handler);  
    return $files;
}

function fileToHerf(array $file, $prefix){
    if (empty($file)) return [];
    $herf = '';
    foreach ($file ?? [] as $key => $value) {
        $herf .= sprintf('<li><a href="%s/%s">%s. %s</a></li>', $prefix, $value, $key, $value);
    }
    return $herf;
}

$prefix = 'index.php';

if (DIRECTORY_SEPARATOR !== $_SERVER['REQUEST_URI'] && $file = str_replace(DIRECTORY_SEPARATOR.$prefix, '', $_SERVER['REQUEST_URI']))
    require WORK_DIR . $file;
else{
    $files = getDirFiles(__DIR__, 'bootstrap.php');
    print fileToHerf($files, $prefix);
}
// echo sprintf('<pre>%s</pre>', print_r($data, true));
