<?php

require_once ("App/Templates/includes/headerFooter.php");
require_once ("common.php");

$db = \Database\Connect::connect();
$subTaskRepository = new \App\Repositories\subtasks\SubTaskRepository($db);
$subTaskService = new \App\Service\subtask\SubTaskService($subTaskRepository);
$subTaskHttpHandler = new \App\Http\subtasks\SubtaskHttpHandler();

siteHeader("Task: ");

$subTaskHttpHandler->subTaskID($subTaskService,$_GET['id']);

siteFooter("ajax/sendFormDataToPHP");