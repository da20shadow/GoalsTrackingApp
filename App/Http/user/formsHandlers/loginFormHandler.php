<?php

namespace App\Http\user\formsHandlers;

spl_autoload_register(function ($class) {
    $base = $_SERVER['DOCUMENT_ROOT'];
    $path = explode('_', $class);
    $class = (implode('/', $path));

    $file = $base . DIRECTORY_SEPARATOR . $class . '.php';
    if (file_exists($file)) {
        include_once $file;
    }
});

use App\Http\user\UserHttpHandler;

if (isset($_POST['username']) && isset($_POST['password'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $userInfo = ["username" => $username,
        "password" => $password
    ];

    $userHttpHandler = new UserHttpHandler();
    echo $userHttpHandler->processLogin($userInfo);
}