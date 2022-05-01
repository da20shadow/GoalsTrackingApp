<?php
require_once ("common.php");

siteHeader("Login");

$userHttpHandler->login();

siteFooter("user/getLoginFormData",
    "ajax/sendFormDataToPHP");