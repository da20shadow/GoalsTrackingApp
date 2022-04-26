<?php

namespace Database;

use Database\interfaces\ResultSetInterface;
use Generator;
use PDOStatement;

class PDOResultSet implements ResultSetInterface
{
    private PDOStatement $pdoStatement;

    /**
     * @param PDOStatement $pdoStatement
     */
    public function __construct(PDOStatement $pdoStatement)
    {
        $this->pdoStatement = $pdoStatement;
    }

    /**
     * @param $className
     * @return Generator
     */
    public function fetch($className): Generator
    {
        while ($row = $this->pdoStatement->fetchObject($className)){

            echo "<pre>";
            var_dump($row);
            echo "</pre>";

            yield $row;
        }
    }
}