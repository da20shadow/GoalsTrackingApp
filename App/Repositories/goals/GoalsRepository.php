<?php

namespace App\Repositories\goals;

use App\Models\goals\GoalDTO;
use Database\interfaces\DatabaseInterface;
use Generator;

class GoalsRepository implements interfaces\GoalRepositoryInterface
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
        echo "<br>";
        echo "Hello From all() in GoalsRepository class";
        echo "<br>";

        $result = $this->db->query(
            "SELECT goal_id AS goalID,
                        goal_title AS goalTitle,
                        goal_description AS goalDescription,
                        user_id AS userID
                        FROM goals"
        )->execute()
            ->fetch(GoalDTO::class);

        return $result;
    }

}