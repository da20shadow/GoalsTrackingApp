<?php
require_once("common.php");
$db = \Database\Connect::connect();
$goalRepository = new \App\Repositories\goals\GoalsRepository($db);
$goalService = new \App\Service\goal\GoalService($goalRepository);
$goalHttpHandler = new \App\Http\goals\GoalHttpHandler();

siteHeader("Create New Task");

$goalHttpHandler->create($goalService);

siteFooter("goal/getGoalFormData", "ajax/sendFormDataToPHP");