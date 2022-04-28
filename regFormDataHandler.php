<?php
spl_autoload_register();
use App\Http\user\UserHttpHandler;

$userHttpHandler = new UserHttpHandler();

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

    echo $userHttpHandler->processRegistration($userInfo);

}