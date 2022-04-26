<?php

namespace App\Service\goal;

use App\Models\goals\GoalDTO;
use Generator;

interface GoalServiceInterface
{
    public function create(GoalDTO $goalDTO) : bool;

    /**
     * @return Generator|GoalDTO[]
     */
    public function getAll() : array|Generator;
}