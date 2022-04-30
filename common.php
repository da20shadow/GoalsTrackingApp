<?php

use App\Http\user\UserHttpHandler;

session_start();

spl_autoload_register();

require_once ("App/Templates/includes/headerFooter.php");

$userHttpHandler = new UserHttpHandler();