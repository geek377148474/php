<?php

use Doctrine\Common\Persistence\Mapping\ClassMetadata;
use Doctrine\Common\Persistence\Mapping\Driver\FileDriver;

final class JSONFileDriver extends FileDriver
{
    public function loadMetadataForClass($className, ClassMetadata $metadata)
    {
        $mappingFileData = $this->getElement($className);

        // use the array of mapping information from the file to populate the $metadata instance
    }

    protected function loadMappingFile($file)
    {
        return json_decode($file, true);
    }
}

use Doctrine\Common\Persistence\Mapping\Driver\DefaultFileLocator;

$fileLocator = new DefaultFileLocator('/path/to/mapping/files', 'json');

$jsonFileDriver = new JSONFileDriver($fileLocator);