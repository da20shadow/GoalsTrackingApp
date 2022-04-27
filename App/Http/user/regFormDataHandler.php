<?php

if (isset($_POST['first_name']) && isset($_POST['last_name'])
    && isset($_POST['username']) && isset($_POST['email'])
    && isset($_POST['password']) && isset($_POST['confirm_password'])) {

    require_once("common.php");

    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    $userInfo = ["first_name" => $firstName,
        "last_name" => $lastName,
        "username" => $username,
        "password" => $password,
        "confirm_password" => $confirmPassword];

    $userHttpHandler->register($userService,$userInfo);

}