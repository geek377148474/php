<?php

use Doctrine\Common\Collections\AbstractLazyCollection;
use Doctrine\DBAL\Connection;

class UsersLazyCollection extends AbstractLazyCollection
{
    /** @var Connection */
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    protected function doInitialize() : void
    {
        $this->collection = $this->connection->fetchAll('SELECT * FROM users');
    }
}