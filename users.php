<?php
use App\Http\user\UserHttpHandler;
use App\Repositories\user\UserRepository;
use App\Service\encryption\ArgonEncryptionService;
use App\Service\user\UserService;

require_once ("App/Templates/includes/headerFooter.php");
require_once ("common.php");

$userRepository = new UserRepository($db);
$encryptionService = new ArgonEncryptionService();
$userService = new UserService($userRepository, $encryptionService);
$userHttpHandler = new UserHttpHandler($template, $dataBinder);


siteHeader("Members");

$userHttpHandler->all($userService);

siteFooter("loginPage/scriptForLoginPage");