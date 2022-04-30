<?php
namespace App\Http\user\formsHandlers;

spl_autoload_register(function ($class){
    $base = $_SERVER['DOCUMENT_ROOT'];
    $path = explode('_',$class);
    $class = (implode('/',$path));

    $file = $base . DIRECTORY_SEPARATOR . $class . '.php';
    if (file_exists($file)){
        include_once $file;
    }
});

use App\Http\user\UserHttpHandler;

if (isset($_POST['first_name']) && isset($_POST['last_name'])
    && isset($_POST['username']) && isset($_POST['email'])
    && isset($_POST['password']) && isset($_POST['confirm_password'])) {

    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    $userInfo = ["first_name" => $firstName,
        "last_name" => $lastName,
        "username" => $username,
        "email" => $email,
        "password" => $password,
        "confirm_password" => $confirmPassword];

    $userHttpHandler = new UserHttpHandler();
    echo $userHttpHandler->processRegistration($userInfo);
}