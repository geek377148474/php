<?php

/**
 * @Annotation
 * @Target("CLASS")
 * @funcName 注解内容1
 * @method 注解内容2
 * @method 注解内容2-1
 * 213e
 */
class A
{
    public $a = 1;
}

function explainDocument($class, $annotionName, $all = false)
{
    $class = $class instanceof ReflectionClass ? $class : new \ReflectionClass($class);
    $docComment = $class->getDocComment();
    $annotionName = is_array($annotionName) ? $annotionName : array_slice(func_get_args(), 1);
    preg_match("/@Annotation\s*([^\s]*)/i", $docComment, $matches);
    if (!$matches[1] == '*') throw new \Exception('Not declared as an annotation class');

    foreach ($annotionName as $value) {
        $all ? preg_match("/@{$value}\s*([^\s]*)/i", $docComment, $matches) : preg_match_all("/@{$value}\s*([^\s]*)/i", $docComment, $matches);
        $annotions[$value] = !isset($matches[1]) ? null : $matches[1];
    }

    return $annotions;
}

// 注解的解析
dd(explainDocument(A::class, 'Annotation', 'Target', 'funcname', 'method'));
