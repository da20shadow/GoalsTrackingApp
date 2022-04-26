<?php
require_once ("App/Templates/includes/headerFooter.php");
require_once ("common.php");

siteHeader("Login");

$userHttpHandler->login($userService);

siteFooter("loginPage/scriptForLoginPage");