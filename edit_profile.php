<?php

require_once ("common.php");

siteHeader("Account");

$userHttpHandler->editProfile($_POST);

siteFooter();