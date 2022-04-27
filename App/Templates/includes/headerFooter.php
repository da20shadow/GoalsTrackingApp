<?php
function siteHeader($title)
{
    echo "
    <!doctype html>
    <html lang=\"en\">
    <head>
        <meta charset=\"UTF-8\">
        <meta name=\"viewport\"
            content=\"width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
        <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css\" rel=\"stylesheet\" 
        integrity=\"sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC\" crossorigin=\"anonymous\">

        <link rel='stylesheet' href='Assets/scss/style.css'>
        <title>$title</title>
    </head>
    
    <body>
    ";
    require_once ('header.php');
}

function siteFooter(...$scripts)
//Receive folder and js file or just js file name
{
    $templateFolder = "Assets/js/";
    $extension = ".js";

    require_once ('footer.php');

    foreach ($scripts as $script){
        $path = $templateFolder . $script . $extension;
        echo "<script src='$path'></script>";
    }
}