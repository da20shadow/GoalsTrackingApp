<?php

use App\Http\tasks\TaskHttpHandler;
use App\Repositories\tasks\TaskRepository;
use App\Service\task\TaskService;

require_once ("App/Templates/includes/headerFooter.php");
require_once ("common.php");


$taskRepository = new TaskRepository($db);
$taskService = new TaskService($taskRepository);
$taskHttpHandler = new TaskHttpHandler($template, $dataBinder);

siteHeader("Home");

$taskHttpHandler->all($taskService);

siteFooter("homepage/scriptForHomePage");