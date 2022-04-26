<?php
require_once ("App/Templates/includes/headerFooter.php");
require_once ("common.php");

siteHeader("Home");

$goalRepository = new \App\Repositories\goals\GoalsRepository($db);
$goalService = new \App\Service\goal\GoalService($goalRepository);
$goalHttpHandler = new \App\Http\goals\GoalHttpHandler($template,$dataBinder);

$goalHttpHandler->create($goalService);

siteFooter("homepage/scriptForHomePage");