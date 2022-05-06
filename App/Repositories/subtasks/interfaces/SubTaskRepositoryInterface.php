<?php

namespace App\Repositories\subtasks\interfaces;

use App\Models\subtasks\SubtaskDTO;
use Generator;

interface SubTaskRepositoryInterface
{
    public function insert(SubtaskDTO $subtaskDTO): bool;
    public function update(int $id, SubtaskDTO $subtaskDTO): bool;
    public function delete(int $id): bool;
    public function updateStatus(int $subtask_id,int $parent_task_id,string $table, string $parent_column): bool;
    public function findSubTaskByID(int $id): ?SubtaskDTO;

    /**
     * @param $subtask_id
     * @return Generator|SubtaskDTO[]
     */
    public function findNestedSubtasks($subtask_id): array|Generator;

    /**
     * @return Generator|SubtaskDTO[]
     */
    public function getAll(): array|Generator;
}