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
        // TODO: Implement insert() method.
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
                            goal_id AS goalID
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
                    completed
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