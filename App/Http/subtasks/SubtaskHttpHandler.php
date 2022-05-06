<?php

namespace App\Http\subtasks;

use App\Http\interfaces\BaseHttpHandler;
use App\Models\subtasks\SubtaskDTO;
use App\Service\subtask\SubTaskServiceInterface;

class SubtaskHttpHandler extends BaseHttpHandler
{
    public function createSubTask(array $formData = []){
        if (isset($formData['title']) && isset($formData['description'])
            && isset($formData['due_date'])){
            //TODO to send subtask form with ajax
        }else {
            $this->render("subtask/_create_subtask");
        }
    }

    public function subTaskID(SubTaskServiceInterface $subTaskService,$subtask_id){
        $this->render('subtask/_subtask',$subTaskService->getSubTaskByID($subtask_id));
    }
}