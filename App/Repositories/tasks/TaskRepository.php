<?php

namespace App\Repositories\tasks;

use App\Models\subtasks\SubtaskDTO;
use App\Models\tasks\TaskDTO;
use App\Repositories\tasks\interfaces\TaskRepositoryInterface;
use Database\interfaces\DatabaseInterface;
use Generator;

class TaskRepository implements TaskRepositoryInterface
{
    private DatabaseInterface $db;

    /**
     * @param DatabaseInterface $db
     */
    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }


    public function insert(TaskDTO $taskDTO): bool
    {
        try {
            $this->db->query(
                "INSERT INTO tasks (task_title,task_description,due_date,goal_id,user_id)
                        VALUES (:title,:description,:due_date,:goal_id,:user_id)"
            )->execute(array(
                ":title" => $taskDTO->getTaskTitle(),
                ":description" => $taskDTO->getTaskDescription(),
                ":due_date" => $taskDTO->getDueDate(),
                ":goal_id" => $taskDTO->getGoalID(),
                ":user_id" => $taskDTO->getUserID()
            ));
            return true;
        }catch (\PDOException $exception){
            return "Error Occur! " . $exception->getMessage();
        }
    }

    public function update(int $id, TaskDTO $taskDTO): bool
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id): bool
    {
        // TODO: Implement delete() method.
    }

    public function findTaskByID(int $id): ?TaskDTO
    {
        return $this->db->query(
            "SELECT task_id AS taskID,
                            task_title AS taskTitle,
                            task_description AS taskDescription,
                            due_date AS dueDate,
                            progress,
                            completed,
                            goal_id AS goalID,
                            total_subtasks AS totalSubtasks
                            FROM tasks
                            WHERE task_id = :task_id"
        )->execute(array(
            ":task_id"=> $id
        ))->fetch(TaskDTO::class)
            ->current();
    }

    public function findSubTasksByTaskID($task_id): Generator
    {
        return $this->db->query(
            "SELECT subtask_id AS subTaskID,
                    subtask_title AS subTaskTitle,
                    subtask_description AS subTaskDescription,
                    due_date AS dueDate,
                    progress,
                    completed,
                    total_subtasks AS totalSubtasks
                    FROM subtasks
                    WHERE task_id = :task_id"
        )->execute(array(
            ":task_id" => $task_id
        ))->fetch(SubtaskDTO::class);
    }

    /**
     * @inheritDoc
     */

    public function getAll(): array|Generator
    {
        return $this->db->query(
            "SELECT task_id AS taskID, 
                    task_title AS taskTitle,
                    task_description AS taskDescription,
                    due_date AS dueDate,
                    progress,
                    completed, 
                    goal_id AS goalID
                    FROM tasks"
        )->execute()
            ->fetch(TaskDTO::class);
    }
}