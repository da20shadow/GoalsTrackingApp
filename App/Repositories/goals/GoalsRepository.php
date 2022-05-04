<?php

namespace App\Repositories\goals;

use App\Models\goals\GoalDTO;
use App\Models\tasks\TaskDTO;
use App\Repositories\goals\interfaces\GoalRepositoryInterface;
use Database\interfaces\DatabaseInterface;
use Generator;

class GoalsRepository implements GoalRepositoryInterface
{

    private DatabaseInterface $db;

    /**
     * @param DatabaseInterface $db
     */
    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }

    public function insert(GoalDTO $goalDTO): bool
    {
        // TODO: Implement insert() method.
    }

    public function findGoalById(int $id): ?GoalDTO
    {
        return $this->db->query(
            "SELECT goal_id AS goalID,
                    goal_title AS goalTitle,
                    goal_description AS goalDescription,
                    due_date AS dueDate,
                    progress,
                    completed,
                    user_id AS userID
                    FROM goals 
                    WHERE goal_id = :goal_id"
        )->execute(array(
            ":goal_id" => $id
        ))->fetch(GoalDTO::class)
            ->current();
    }

    public function findTasksByGoalID($goal_id): Generator
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
                    WHERE goal_id = :goal_id 
                      AND completed = 0"
        )->execute(array(
            ":goal_id" => $goal_id
        ))->fetch(TaskDTO::class);
    }

    /**
     * @inheritDoc
     */
    public function all(): array|Generator
    {
        return $this->db->query(
            "SELECT goal_id AS goalID,
                            goal_title AS goalTitle,
                            goal_description AS goalDescription,
                            due_date AS dueDate,
                            progress,
                            completed,
                            user_id AS userID
                            FROM goals"
        )->execute()
            ->fetch(GoalDTO::class);
    }

}