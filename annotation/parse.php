<?php

namespace annotation;

use ReflectionClass;
use Doctrine\Common\Annotations\DocLexer;
use Doctrine\Common\Annotations\DocParser;
use Doctrine\Common\Annotations\AnnotationReader;

class ParseClass
{
    public $_obj;

    public $_obj_name;

    public $_doc;

    public $_properties;

    public $_propertie;

    public $_methods;

    public $_method;

    public $propertieArr = [];

    public $methodArr = [];


    public function __construct(\ReflectionClass $obj)
    {
        $this->_obj = $obj;
        $this->_obj_name = $obj->getName();
    }

    public function parseToDoc()
    {
        return $this;
    }

    public function getTraits()
    {
        $getTraits = $this->_obj->getTraits();
        if ($getTraits)
            echo 'dosomething for '.__METHOD__;
        return $getTraits ?? false;
    }

    public function getParentClass()
    {
        $getParentClass = $this->_obj->getParentClass();
        return $getParentClass ?? false;
    }

    public function getInterfaces()
    {
        $getInterfaces = $this->_obj->getInterfaces();
        return $getInterfaces ? array_shift($getInterfaces) : false;
    }

    public function resetObj()
    {
        $this->_obj = new ReflectionClass($this->_obj_name);
        return $this->_obj;
    }

    public function getPropertiesDoc($obj = null)
    {
        $this->_obj = $obj ? $obj : $this->_obj;
        if ($obj === false) {
            $this->resetObj();
            return [];
        }

        $this->_properties = $this->_obj->getProperties();
        $propertieArr = [];
        foreach ($this->_properties as $propertie) {
            $doc = $propertie->getDocComment();
            $statementArr = $this->parseDoc($doc, $propertie);
            $propertieArr = array_merge($propertieArr, $statementArr);
        }

        $this->propertieArr = array_merge($this->propertieArr, $propertieArr);
        $this->getTraits();
        $this->getPropertiesDoc($this->getParentClass());
        $this->getPropertiesDoc($this->getInterfaces());

        return $this->propertieArr;
    }

    public function getMethodsDoc($obj = null)
    {
        $this->_obj = $obj ? $obj : $this->_obj;
        if ($obj === false) {
            $this->resetObj();
            return [];
        }

        $this->_methods = $this->_obj->getMethods();
        $methodArr = [];
        foreach ($this->_methods as $method) {
            $doc = $method->getDocComment();
            $statementArr = $this->parseDoc($doc, $method);
            $methodArr = array_merge($methodArr, $statementArr);
        }

        $this->methodArr = array_merge($this->methodArr, $methodArr);
        $this->getTraits();
        $this->getMethodsDoc($this->getParentClass());
        $this->getMethodsDoc($this->getInterfaces());

        return $this->methodArr;
    }

    public function parseDoc($doc, $propertie)
    {
        // $doc = $this->_doc;
        // $propertie = $this->_propertie;
        $docName = $propertie->getName();
        $docArr = explode(PHP_EOL, $doc);

        array_walk($docArr, function (&$docSlice) {
            $partThree = preg_quote('*/');
            $partTwo = preg_quote('*') . '\s*';
            $partOne = preg_quote('/**', '/');
            $pattern = "@({$partThree}|{$partTwo}|{$partOne})@";

            $docSlice = preg_replace($pattern, '', trim($docSlice));
        });

        $statementArr = [];
        foreach ($docArr as $k => $docSlice) {
            if (strlen($docSlice) > 0) {
                $statementArr[$docName][$k] = $docSlice;
            }
        }

        $propertieStatements = $statementArr[$docName];
        $realStatements = '';
        $separator = ' ';
        foreach ($propertieStatements as $k => $statement) {
            if (empty($realStatements)) {
                $realStatements = $statement;
            }
            if (isset($propertieStatements[$k + 1])) {
                $realStatements .= $separator . $propertieStatements[$k + 1];
            }
        }
        $statementArr = [];
        $statementArr[$docName] = $realStatements;
        return $statementArr;
    }

    private function setDoc($doc)
    {
        $this->_doc = $doc;
    }

    private function setPropertie($propertie)
    {
        $this->_propertie = $propertie;
    }
}

$obj = new ReflectionClass(DocParser::class);
$parse = new ParseClass($obj);
// $parse->getPropertiesDoc();
dump($parse->getPropertiesDoc());
dump($parse->getMethodsDoc());

