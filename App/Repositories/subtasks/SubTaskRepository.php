<?php

namespace App\Repositories\subtasks;

use App\Models\subtasks\SubtaskDTO;
use Database\interfaces\DatabaseInterface;
use Generator;

class SubTaskRepository implements interfaces\SubTaskRepositoryInterface
{
    private DatabaseInterface $db;

    /**
     * @param DatabaseInterface $db
     */
    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }

    public function insert(SubtaskDTO $subtaskDTO): bool
    {
        // TODO: Implement insert() method.
    }

    public function update(int $id, SubtaskDTO $subtaskDTO): bool
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id): bool
    {
        // TODO: Implement delete() method.
    }

    public function updateStatus(int $subtask_id, int $parent_task_id,
                                 string $table,string $parent_column): bool
    {

        $this->db->query(
            "UPDATE subtasks
                      SET progress = :progress,
                      completed = :completed
                      WHERE subtask_id = :subtask_id;"
            )->execute(array(
            ":progress" => 100,
            ":completed" => 3,
            ":subtask_id" => $subtask_id
        ));

         $allParentSubtasks = $this->findNestedSubtasksByParent($parent_column,$parent_task_id);

        $totalTasks = 0;
        $percentCompleted = 0;
        foreach ($allParentSubtasks as $task){
            $totalTasks++;
            $percentCompleted += $task->getProgress();

            if ($task->getTaskID() != 0){
                $this->updateStatus($task->getSubTaskID(),$task->getTaskID(),"tasks","task_id");
            }else{
                $this->updateStatus($task->getSubTaskID(),$task->getParentID(),"subtasks","parent_id");
            }

        }
        $percentCompleted = $percentCompleted / $totalTasks;

        if ($table == "subtasks"){
            $parent_column = "subtask_id";
        }else{
            $parent_column = "task_id";
        }

        if ($percentCompleted == 100){
            $this->db->query(
                "UPDATE $table
                    SET progress = :parent_progress,
                    completed = :parent_task_completed
                    WHERE $parent_column = :parent_task_id"
            )->execute(array(
                ":parent_progress" => 100,
                ":parent_task_completed" => 3,
                ":parent_task_id" => $parent_task_id
            ));

        }else{
            $this->db->query(
                "UPDATE $table
                    SET progress = :parent_progress
                    WHERE $parent_column = :parent_task_id"
            )->execute(array(
                ":parent_progress" => $percentCompleted,
                ":parent_task_id" => $parent_task_id
            ));
        }
        return true;
    }

    public function findNestedSubtasksByParent($parentColumn,$parent_id): array|Generator
    {
        return $this->db->query(
            "SELECT subtask_id AS subTaskID,
                            progress,
                            task_id AS taskID,
                            parent_id AS parentID
                            FROM subtasks
                            WHERE $parentColumn = :parent_id"
        )->execute(array(
            ":parent_id"=> $parent_id
        ))->fetch(SubtaskDTO::class);

    }

    public function findSubTaskByID(int $id): ?SubtaskDTO
    {
        return $this->db->query(
            "SELECT subtask_id AS subTaskID,
                            subtask_title AS subTaskTitle,
                            subtask_description AS subTaskDescription,
                            due_date AS dueDate,
                            progress,
                            completed,
                            total_subtasks AS totalSubtasks,
                            task_id AS taskID,
                            parent_id AS parentID
                            FROM subtasks
                            WHERE subtask_id = :subtask_id"
        )->execute(array(
            ":subtask_id"=>$id
        ))->fetch(SubtaskDTO::class)
            ->current();
    }

    public function findNestedSubtasks($subtask_id): array|Generator
    {
        return $this->db->query(
            "SELECT subtask_id AS subTaskID,
                            subtask_title AS subTaskTitle,
                            due_date AS dueDate,
                            progress,
                            completed,
                            total_subtasks AS totalSubtasks
                            FROM subtasks
                            WHERE parent_id = :parent_id"
        )->execute(array(
            ":parent_id"=> $subtask_id
        ))->fetch(SubtaskDTO::class);

    }

    /**
     * @inheritDoc
     */
    public function getAll(): array|Generator
    {
        // TODO: Implement getAll() method.
    }

}