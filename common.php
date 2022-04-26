<?php

use Core\Binder\DataBinder;
use Core\Template\Template;
use Database\PDODatabase;

session_start();
spl_autoload_register();

$template = new Template();
$dataBinder = new DataBinder();
$dbInfo = parse_ini_file('Config/db.ini');

$pdo = null;
try {

    $pdo = new PDO($dbInfo['dsn'],$dbInfo['user'],$dbInfo['pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch (PDOException $err){
    echo $err->getMessage();
    throw new PDOException($err->getMessage());
}
$db = new PDODatabase($pdo);
