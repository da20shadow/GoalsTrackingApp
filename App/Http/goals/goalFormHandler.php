<?php


namespace App\Http\tasks;

session_start();

spl_autoload_register(function ($class) {
    $base = $_SERVER['DOCUMENT_ROOT'];
    $path = explode('_', $class);
    $class = (implode('/', $path));

    $file = $base . DIRECTORY_SEPARATOR . $class . '.php';
    if (file_exists($file)) {
        include_once $file;
    }
});


if (isset($_POST['title']) && isset($_POST['description'])
    && isset($_POST['due_date'])) {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['due_date'];

    $userInfo = ["title" => $title,
        "description" => $description,
        "due_date" => $date
    ];

    echo "<pre>";
    var_dump($userInfo);
    echo "<pre>";
//    $taskHttpHandler = new TaskHttpHandler();
//    echo $taskHttpHandler->createTask($userInfo);
}