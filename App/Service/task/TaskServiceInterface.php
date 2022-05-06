<?php

namespace App\Service\task;

use App\Models\tasks\TaskDTO;
use Generator;

interface TaskServiceInterface
{
    public function create(TaskDTO $taskDTO) : bool;
    public function edit(TaskDTO $taskDTO) : bool;
    public function getTaskByID($task_id): ?TaskDTO;
    public function getSubTasksByTaskID($task_id): array|Generator;
    /**
     * @return Generator|TaskDTO[]
     */
    public function getAll() : array|Generator;
}