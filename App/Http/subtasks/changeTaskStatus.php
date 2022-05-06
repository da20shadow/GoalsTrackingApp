<?php
spl_autoload_register(function ($class){
    $base = $_SERVER['DOCUMENT_ROOT'];
    $path = explode('_',$class);
    $class = (implode('/',$path));

    $file = $base . DIRECTORY_SEPARATOR . $class . '.php';
    if (file_exists($file)){
        include_once $file;
    }
});

if (isset($_POST['task_id']) && isset($_POST['parent_task_id'])
        && isset($_POST['table']) && isset($_POST['parent_column'])){

    $task_id = $_POST['task_id'];
    $parent_task_id = $_POST['parent_task_id'];
    $table = $_POST['table'];
    $parent_column = $_POST['parent_column'];

    $db = \Database\Connect::connect();
    $subTaskRepository = new \App\Repositories\subtasks\SubTaskRepository($db);
    $subTaskService = new \App\Service\subtask\SubTaskService($subTaskRepository);

    if ($subTaskService->updateStatus($task_id,$parent_task_id,$table,$parent_column)){
        echo "Successfully Market As Completed!";
    }else{
        echo "Error! Unable to change task status to completed!";
    }
}