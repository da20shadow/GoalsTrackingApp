<?php

use App\Http\goals\GoalHttpHandler;
use App\Repositories\goals\GoalsRepository;
use App\Service\goal\GoalService;

require_once ("App/Templates/includes/headerFooter.php");
require_once ("common.php");

$goalRepository = new GoalsRepository($db);
$goalService = new GoalService($goalRepository);
$goalHttpHandler = new GoalHttpHandler($template, $dataBinder);

siteHeader("Goals");

$goalHttpHandler->all($goalService);

siteFooter("homepage/scriptForHomePage");