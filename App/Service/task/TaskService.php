<?php

namespace App\Service\task;

use App\Models\tasks\TaskDTO;
use App\Repositories\tasks\interfaces\TaskRepositoryInterface;
use App\Service\task\TaskServiceInterface;
use Generator;

class TaskService implements TaskServiceInterface
{

    private TaskRepositoryInterface $taskRepository;

    /**
     * @param TaskRepositoryInterface $taskRepository
     */
    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function create(TaskDTO $taskDTO): bool
    {
        // TODO: Implement create() method.
    }

    public function edit(TaskDTO $taskDTO): bool
    {
        // TODO: Implement edit() method.
    }

    public function getTaskByID($task_id): ?TaskDTO
    {
        return $this->taskRepository->findTaskByID($task_id);
    }

    public function getSubTasksByTaskID($task_id): array|Generator
    {
        return $this->taskRepository->findSubTasksByTaskID($task_id);
    }

    /**
     * @inheritDoc
     */
    public function getAll(): array|Generator
    {
        return $this->taskRepository->getAll();
    }
}