<?php

namespace Database;

use Database\interfaces\ResultSetInterface;
use Database\interfaces\StatementInterface;
use PDOStatement;

class PDOPreparedStatement implements StatementInterface
{
    private PDOStatement $pdoStatement;

    /**
     * @param PDOStatement $pdoStatement
     */
    public function __construct(PDOStatement $pdoStatement)
    {
        $this->pdoStatement = $pdoStatement;
    }

    public function execute(array $params = []): ResultSetInterface
    {
        $this->pdoStatement->execute($params);
        return new PDOResultSet($this->pdoStatement);
    }
}