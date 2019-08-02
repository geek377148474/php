<?php

namespace MyProject\Entities;

use Doctrine\ORM\Mapping AS ORM;
use Symfony\Component\Validator\Constraints AS Assert;

/**
 * @author Benjamin Eberlei
 * @ORM\Entity
 * @MyProject\Annotations\Foobarable
 */
class User
{
    /**
     * @ORM\Id @ORM\Column @ORM\GeneratedValue
     * @dummy
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotEmpty
     * @Assert\Email
     * @var string
     */
    private $email;
}

use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\IndexedReader;

$reader = new IndexedReader(new AnnotationReader());
var_dump($reader);

