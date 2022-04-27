<?php

namespace App\Http\tasks;

use App\Http\interfaces\BaseHttpHandler;
use App\Service\task\TaskServiceInterface;

class TaskHttpHandler extends BaseHttpHandler
{

    public function singleTask(TaskServiceInterface $taskService){
        $this->render('home/index');
    }

    public function all(TaskServiceInterface $taskService){
        $this->render('task/all_tasks',$taskService->getAll());
    }


}