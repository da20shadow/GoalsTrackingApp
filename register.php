<?php
require_once ("common.php");

siteHeader("Register");

$userHttpHandler->register();

siteFooter("user/userFormsValidation",
        "user/getRegFormData",
        "ajax/sendFormDataToPHP");
