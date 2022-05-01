<?php

require_once ("common.php");

siteHeader("Members");

$userHttpHandler->all();

siteFooter("loginPage/scriptForLoginPage");