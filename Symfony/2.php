<?php
use Symfony\Component\Finder\Finder;

$finder = new Finder();
// find all files in the current directory
$finder->files()->in(__DIR__);

// check if there are any search results
if ($finder->hasResults()) {
    // ...
}

foreach ($finder as $file) {
    echo get_class($file);echo PHP_EOL; // Symfony\Component\Finder\SplFileInfo
    echo $absoluteFilePath = $file->getRealPath();echo PHP_EOL;
    // echo $fileNameWithExtension = $file->getRelativePathname();echo PHP_EOL;
    echo $file->getContents();echo PHP_EOL;
    echo '...';echo PHP_EOL;
    // ...
}