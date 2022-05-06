<?php

use App\Http\tasks\TaskHttpHandler;

require_once ("common.php");

$db = \Database\Connect::connect();
$subtaskRepository = new \App\Repositories\subtasks\SubTaskRepository($db);
$subtaskService = new \App\Service\subtask\SubTaskService($subtaskRepository);
$subtaskHttpHandler = new \App\Http\subtasks\SubtaskHttpHandler();

siteHeader("Create New Task");

$subtaskHttpHandler->createSubTask($_POST);

siteFooter("task/getTaskFormData","ajax/sendFormDataToPHP");