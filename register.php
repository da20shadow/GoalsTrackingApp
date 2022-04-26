<?php
require_once ("App/Templates/includes/headerFooter.php");
require_once ("common.php");

siteHeader("Register");

$userHttpHandler->register($userService);

siteFooter("registerPage/scriptForRegisterPage");