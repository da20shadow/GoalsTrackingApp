<?php

use App\Http\user\UserHttpHandler;

session_start();

spl_autoload_register();

require_once ("App/Templates/includes/headerFooter.php");
require_once ("App/Service/calculations/CalculateRemainDays.php");

$userHttpHandler = new UserHttpHandler();