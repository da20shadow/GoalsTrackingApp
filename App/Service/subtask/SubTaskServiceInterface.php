<?php

namespace App\Service\subtask;

use App\Models\subtasks\SubtaskDTO;
use Generator;

interface SubTaskServiceInterface
{
    public function create(SubtaskDTO $subtaskDTO): bool;
    public function edit(SubtaskDTO $subtaskDTO): bool;
    public function updateStatus(int $subtask_id,int $parent_task_id, string $table,string $parent_column): bool;
    public function getSubTaskByID($subtask_id): ?SubtaskDTO;
    public function getNestedSubtasks($subtask_id): array|Generator;
    /**
     * @return Generator|SubtaskDTO[]
     */
    public function getAll(): array|Generator;
}