<?php

namespace Database;

spl_autoload_register(function ($class){
    $base = $_SERVER['DOCUMENT_ROOT'];
    $path = explode('_',$class);
    $class = (implode('/',$path));

    $file = $base . DIRECTORY_SEPARATOR . $class . '.php';
    if (file_exists($file)){
        include_once $file;
    }
});

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