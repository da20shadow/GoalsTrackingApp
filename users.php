<?php
use App\Http\user\UserHttpHandler;
use App\Repositories\user\UserRepository;
use App\Service\encryption\ArgonEncryptionService;
use App\Service\user\UserService;

require_once ("App/Templates/includes/headerFooter.php");
require_once ("common.php");

siteHeader("Members");

$userHttpHandler->all($userService);

siteFooter("loginPage/scriptForLoginPage");