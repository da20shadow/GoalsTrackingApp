<?php

namespace App\Repositories\tasks\interfaces;

use App\Models\tasks\TaskDTO;
use Generator;

interface TaskRepositoryInterface
{
    public function insert(TaskDTO $taskDTO) : bool;
    public function update(int $id, TaskDTO $taskDTO) : bool;
    public function delete(int $id) : bool;
    public function findUserById(int $id) : ?TaskDTO;

    /**
     * @return Generator|TaskDTO[]
     */
    public function getAll(): array|Generator;
}