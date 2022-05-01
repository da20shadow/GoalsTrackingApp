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

            yield $row;
        }
    }
}