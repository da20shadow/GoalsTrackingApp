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

use PDO;
use PDOException;

class Connect
{

    public static function connect(): PDODatabase
    {
        $base = $_SERVER['DOCUMENT_ROOT'];
        $file = $base . DIRECTORY_SEPARATOR . "Config/db.ini";
        $dbInfo = parse_ini_file($file);
        $pdo = null;
        try {

            $pdo = new PDO($dbInfo['dsn'],$dbInfo['user'],$dbInfo['pass']);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }catch (PDOException $err){
            echo $err->getMessage();
            throw new PDOException($err->getMessage());
        }
        return new PDODatabase($pdo);
    }
}