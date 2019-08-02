<?php
#===============================prototype 1=============================

$obj = new ReflectionClass(DocParser::class);
# 获取所有属性
$getDefaultProperties = $obj->getDefaultProperties();
$getProperties = $obj->getProperties();
$getStaticProperties = $obj->getStaticProperties();
// dump($getDefaultProperties);
// dump($getProperties);
// dump($getStaticProperties);

# 所有属性分别获取他们的注释 且 只选择第一行注释 如果不换行 则可以累加
$PropertieArr = [];
foreach ($getProperties as $propertie) {
    $doc = $propertie->getDocComment();
    $statementArr = parseDoc($doc, $propertie);
    $PropertieArr = array_merge($PropertieArr, $statementArr);
}
dump($PropertieArr);

# 获取所有方法
$getMethods = $obj->getMethods();
// dump($getMethods);

# ...
$MethodArr = [];
foreach ($getMethods as $method) {
    $doc = $method->getDocComment();
    $statementArr = parseDoc($doc, $method);
    $MethodArr = array_merge($MethodArr, $statementArr);
}
dump($MethodArr);
#===========================================================

# 获取所有的父类
$getParentClass = $obj->getParentClass();
if ($getParentClass !== false) echo 'dosomething...get and merge';




#===========================================================

# note