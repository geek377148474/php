<?php

namespace Symfony;

use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

$validator = Validation::createValidator();
$violations = $validator->validate('Bernhard', array(
    new Length(array('min' => 10)),
    new NotBlank(),
));
 
if (0 !== count($violations)) {
    // there are errors, now you can show them / 有错误发生，现在你可以显示它们
    foreach ($violations as $violation) {
        echo $violation->getMessage().'<br>';
    }
}


$validator = Validation::createValidator();
$notBlank = new NotBlank();
$notBlank->message = '参数不能为空';
$violations = $validator->validate('', array(
    new Length(array('min' => 10)),
    $notBlank,
));

if (0 !== count($violations)) {
    // there are errors, now you can show them / 有错误发生，现在你可以显示它们
    foreach ($violations as $violation) {
        echo $violation->getMessage().'<br>';
    }
}