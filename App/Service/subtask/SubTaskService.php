<?php

namespace App\Service\subtask;

use App\Models\subtasks\SubtaskDTO;
use App\Repositories\subtasks\interfaces\SubTaskRepositoryInterface;
use Generator;

class SubTaskService implements SubTaskServiceInterface
{
    private SubTaskRepositoryInterface $subTaskRepository;

    /**
     * @param SubTaskRepositoryInterface $subTaskRepository
     */
    public function __construct(SubTaskRepositoryInterface $subTaskRepository)
    {
        $this->subTaskRepository = $subTaskRepository;
    }

    public function create(SubtaskDTO $subtaskDTO): bool
    {
        // TODO: Implement create() method.
    }

    public function edit(SubtaskDTO $subtaskDTO): bool
    {
        // TODO: Implement edit() method.
    }

    public function updateStatus(int $subtask_id,int $parent_task_id, string $table, string $parent_column): bool
    {
        return $this->subTaskRepository->updateStatus($subtask_id,$parent_task_id, $table,$parent_column);
    }

    public function getSubTaskByID($subtask_id): ?SubtaskDTO
    {
        return $this->subTaskRepository->findSubTaskByID($subtask_id);
    }

    public function getNestedSubtasks($subtask_id): array|Generator
    {
        return $this->subTaskRepository->findNestedSubtasks($subtask_id);
    }

    /**
     * @inheritDoc
     */
    public function getAll(): array|Generator
    {
        // TODO: Implement getAll() method.
    }

}