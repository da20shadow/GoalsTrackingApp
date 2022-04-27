<?php

namespace App\Service\task;

use App\Models\tasks\TaskDTO;
use Generator;

interface TaskServiceInterface
{
    public function create(TaskDTO $taskDTO) : bool;
    public function edit(TaskDTO $taskDTO) : bool;

    /**
     * @return Generator|TaskDTO[]
     */
    public function getAll() : array|Generator;
}