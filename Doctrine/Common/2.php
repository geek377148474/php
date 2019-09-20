<?php

declare(strict_types=1);

use Doctrine\Common\ClassLoader;

// require '/data/www/www.php.com/vendor/doctrine/common/lib/Doctrine/Common/ClassLoader.php';
$testLoader = new \Doctrine\Common\ClassLoader('MyProject', '/data/www/www.php.com/Doctrine/Common/src');
$testLoader->register();
// require '/data/www/www.php.com/Doctrine/Common/src/Test.php';
$test = new \MyProject\Test();
$test();