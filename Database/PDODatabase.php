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

use Database\interfaces\DatabaseInterface;
use Database\interfaces\StatementInterface;
use PDO;

class PDODatabase implements DatabaseInterface
{

    private PDO $pdo;

    /**
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    public function query(string $query): StatementInterface
    {
        $stmt = $this->pdo->prepare($query);
        return new PDOPreparedStatement($stmt);
    }

    public function getErrorInfo(): array
    {
        // TODO: Implement getErrorInfo() method.
    }
}