<?php

/**
 * @var \Doctrine\Common\Persistence\ObjectManager
 */
/*
    public function find($className, $id);
    public function persist($object);
    public function remove($object);
    public function merge($object);
    public function clear($objectName = null);
    public function detach($object);
    public function refresh($object);
    public function flush();
    public function getRepository($className);
    public function getClassMetadata($className);
    public function getMetadataFactory();
    public function initializeObject($obj);
    public function contains($object);
*/

/**
 * @var \Doctrine\Common\Persistence\ObjectRepository
 */
/*
    public function find($id);
    public function findAll();
    public function findBy(array $criteria, ?array $orderBy = null, $limit = null, $offset = null);
    public function findOneBy(array $criteria);
    public function getClassName();
*/

/**
 * @var \Doctrine\Common\Persistence\Mapping\ClassMetadata
 */
/*
    public function getName();
    public function getIdentifier();
    public function getReflectionClass();
    public function isIdentifier($fieldName);
    public function hasField($fieldName);
    public function hasAssociation($fieldName);
    public function isSingleValuedAssociation($fieldName);
    public function isCollectionValuedAssociation($fieldName);
    public function getFieldNames();
    public function getIdentifierFieldNames();
    public function getAssociationNames();
    public function getTypeOfField($fieldName);
    public function getAssociationTargetClass($assocName);
    public function isAssociationInverseSide($assocName);
    public function getAssociationMappedByTargetField($assocName);
    public function getIdentifierValues($object);
*/

/**
 * @var \Doctrine\Common\Persistence\Mapping\ClassMetadataFactory
 */
/*
    public function getAllMetadata();
    public function getMetadataFor($className);
    public function hasMetadataFor($className);
    public function setMetadataFor($className, $class);
    public function isTransient($className);
*/

/**
 * @var \Doctrine\Common\Persistence\Mapping\Driver\MappingDriver
 */
/*
    public function loadMetadataForClass($className, ClassMetadata $metadata);
    public function getAllClassNames();
    public function isTransient($className);
*/