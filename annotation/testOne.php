<?php

namespace Test;

use ReflectionClass;
use Doctrine\Common\Annotations\AnnotationReader;
// composer require doctrine/annotations

// 内容
/**
 * @Undocumented class
 * @fsdf
 */
class Foo
{
    /**
     * @MyAnnotation(myProperty="value")
     * @MyAnnotation(myProperty="value2")
     */
    private $bar;
}

// 约束
/**
 * @Annotation
 */
final class MyAnnotation
{
    public $myProperty;
}

$reflectionClass = new ReflectionClass(Foo::class);
$property = $reflectionClass->getProperty('bar');

$reader = new AnnotationReader();
// AnnotationReader::addGlobalIgnoredName('dummy');
$myAnnotation = $reader->getPropertyAnnotation(
    $property,
    MyAnnotation::class
);
dump($myAnnotation);
/*
@核心方法
$this->Annotation()
[返回annotation对象]
@核心方法解析
$this->Annotation()
    $this->match
    [Attempts to match the given token with the current lookahead token.]
    [If they match, updates the lookahead token; otherwise raises a syntax error.]
        DocLexer::T_AT
        [All tokens that are also identifiers should be >= 100]
    $this->Identifier()
    [Identifier ::= string]
        $this->lexer->isNextTokenAny
        [Checks whether any of the given tokens matches the current lookahead.]
        $this->lexer->moveNext()
        [Moves to the next token in the input string.]
        while
            $this->lexer->isNextToken
            [Checks whether a given token matches the current lookahead]
            $this->match
            $this->matchAny
    if
        $this->lexer->isNextToken
        [Checks whether a given token matches the current lookahead]
        $this->lexer->nextTokenIsAdjacent()
    if
        $this->classExists
    if
        $this->collectAnnotationMetadata
    $this->MethodCall()
@核心流程
getPropertyAnnotation
    $this->getPropertyAnnotations
        $this->parser->parse
            $this->Annotations()
                $this->Annotation()
@完整流程解析
getPropertyAnnotation(ReflectionProperty $property, $annotationName)
[以$annotationName的属性作为key，以$property对应的注释为value，返回value]
    $this->getPropertyAnnotations
    [返回注释数组]
        $this->parser->setTarget
        [设置当前target]
        $this->getPropertyImports
        [获取当前imports]
            $this->getClassImports($class)
            [获取$class的imports]
                $this->collectParsingMetadata
                [收集给定类的解析元数据]
                    $this->preParser->parse($input, $context = '')
                    [解析给定的docblock字符串以进行注释]
                        $this->findInitialTokenPosition($input)(null)
                        [查找第一个有效的@的位置]
                        $this->lexer->setInput
                        [设置要标记化的输入数据]
                        $this->lexer->moveNext()
                        [移动到输入字符串中的下一个标记]
                        $this->Annotations()
                        [return $annotations]
                            if 
                            [确保@开头的token(跳过不是@开头的)]
                                $this->lexer->moveNext();
                                [移动到输入字符串中的下一个标记]
                            if
                            [确保@前面有不可捕获的模式(跳过换行的)]
                            if
                            [确保@后跟命名空间分隔符，或者标识符标记 ]
                                $this->lexer->glimpse()
                                [Peeks at the next token, returns it and immediately resets the peek]
                                    $this->peek()
                                    [Moves the lookahead token forward]
                            if
                            [$annotations]
                    array_merge
                    [imports]
                        self::$globalImports
                        [全局imports]
                        $this->phpParser->parseClass
                        [Parses a class.parse Use Statements of the class.]
                            $this->getFileContent
                            [获取内容]
                            $tokenizer->parseUseStatements
                            [parseUseStatements]
                        array('__NAMESPACE__' => $class->getNamespaceName())
                        [$class namespace]

            foreach
            [获取trait中的imports]
                $this->phpParser->parseClass
            array_merge
            [imports = $class的imports + trait中的imports]
        $this->parser->setImports
        [设置当前imports]
        $this->getIgnoredAnnotationNames
        [get Ignored Annotation Names]
        $this->parser->setIgnoredAnnotationNames
        [set Ignored Annotation Names]
        $this->parser->setIgnoredAnnotationNamespaces
        [set Ignored Annotation Namespaces]
        $this->parser->parse
        [Parses the given docblock string for annotations]
    foreach
    [返回第一个匹配到$annotationName指定的属性的注释]
*/



/*
@DocParser属性解析
    private static $classIdentifiers
        [An array of all valid tokens for a class name]  (@var array)
    private $lexer
        [The lexer]  (@var \Doctrine\Common\Annotations\DocLexer)
    private $target
        [Current target context]  (@var integer)
    private static $metadataParser
        [Doc parser used to collect annotation target]  (@var \Doctrine\Common\Annotations\DocParser)
    private $isNestedAnnotation
        [Flag to control if the current annotation is nested or not]  (@var boolean)
    private $imports
        [Hashmap containing all use-statements that are to be used when parsing the given doc block]
    private $classExists
        [This hashmap is used internally to cache results of class_exists() look-ups] (@var array)
    $ignoreNotImportedAnnotations
        [Whether annotations that have not been imported should be ignored.] (@var boolean)
    private $namespaces
        [An array of default namespaces if operating in simple mode.]  (@var string[])
    private $ignoredAnnotationNames
        [A list with annotations that are not causing exceptions when not resolved to an annotation class]  (@var bool[] indexed by annotation name)
    private $ignoredAnnotationNamespaces
        [A list with annotations in namespaced format]
    private $context
        [] (@var string)
    private static $annotationMetadata
        [Hash-map for caching annotation metadata]  (@var array)
    private static $typeMap
        [Hash-map for handle types declaration]
@DocParser方法解析
    __construct()
        [Constructs a new DocParser]
    setIgnoredAnnotationNames(array $names)
        [Sets the annotation names that are ignored during the parsing process]
    setIgnoredAnnotationNamespaces($ignoredAnnotationNamespaces)
        [Sets the annotation namespaces that are ignored during the parsing process]
    setIgnoreNotImportedAnnotations($bool)
        [Sets ignore on not-imported annotations]
    addNamespace($namespace)
        [Sets the default namespaces]
    setImports(array $imports)
        [Sets the imports]
    setTarget($target)
        [Sets current target context as bitmask]
    parse($input, $context = '')
        [Parses the given docblock string for annotations]
    findInitialTokenPosition($input)
        [Finds the first valid annotation]
    match($token)
        [Attempts to match the given token with the current lookahead token.]
        [If they match, updates the lookahead token; otherwise raises a syntax error.]
    matchAny(array $tokens)
        [Attempts to match the current lookahead token with any of the given tokens.]
    syntaxError($expected, $token = null)
        [Generates a new syntax error]
    classExists($fqcn)
        [Attempts to check if a class exists or not. This never goes through the PHP autoloading mechanism]
        [but uses the {@link AnnotationRegistry} to load classes]
    collectAnnotationMetadata($name)
        [Collects parsing metadata for a given annotation class]
    collectAttributeTypeMetadata(&$metadata, Attribute $attribute)
        [Collects parsing metadata for a given attribute]

*/

