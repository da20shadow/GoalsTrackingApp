<?php

use App\Http\tasks\TaskHttpHandler;

require_once ("common.php");

$db = \Database\Connect::connect();
$taskRepository = new \App\Repositories\tasks\TaskRepository($db);
$taskService = new \App\Service\task\TaskService($taskRepository);
$taskHttpHandler = new TaskHttpHandler();

siteHeader("Tasks");

$taskHttpHandler->all($taskService);

siteFooter();