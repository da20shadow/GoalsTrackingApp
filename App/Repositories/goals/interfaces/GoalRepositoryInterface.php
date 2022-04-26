<?php

namespace App\Repositories\goals\interfaces;

use App\Models\goals\GoalDTO;
use Generator;

interface GoalRepositoryInterface
{
    public function insert(GoalDTO $goalDTO) : bool;
    public function findGoalById(int $id) : ?GoalDTO;

    /**
     * @return Generator|GoalDTO[]
     */
    public function all(): array|Generator;
}