<?php

namespace App\Repositories\goals;

use App\Models\goals\GoalDTO;
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
        // TODO: Implement findGoalById() method.
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
                            user_id AS userID
                            FROM goals"
        )->execute()
            ->fetch(GoalDTO::class);
    }

}