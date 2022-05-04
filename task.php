<?php

use App\Http\tasks\TaskHttpHandler;
use App\Repositories\tasks\TaskRepository;
use App\Service\task\TaskService;

require_once ("App/Templates/includes/headerFooter.php");
require_once ("common.php");

$db = \Database\Connect::connect();
$taskRepository = new TaskRepository($db);
$taskService = new TaskService($taskRepository);
$taskHttpHandler = new TaskHttpHandler();

siteHeader("Task: ");

$taskHttpHandler->taskID($taskService,$_GET['id']);

siteFooter();