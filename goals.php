<?php

use App\Http\goals\GoalHttpHandler;
use App\Repositories\goals\GoalsRepository;
use App\Service\goal\GoalService;

require_once ("App/Templates/includes/headerFooter.php");
require_once ("common.php");

$db = \Database\Connect::connect();
$goalRepository = new GoalsRepository($db);
$goalService = new GoalService($goalRepository);
$goalHttpHandler = new GoalHttpHandler();

siteHeader("Goals");

$goalHttpHandler->all($goalService);

siteFooter("homepage/scriptForHomePage");