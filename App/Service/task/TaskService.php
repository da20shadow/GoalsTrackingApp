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
     * @param TaskRepositoryInterface $userRepository
     */
    public function __construct(TaskRepositoryInterface $userRepository)
    {
        $this->taskRepository = $userRepository;
    }

    public function create(TaskDTO $taskDTO): bool
    {
        // TODO: Implement create() method.
    }

    public function edit(TaskDTO $taskDTO): bool
    {
        // TODO: Implement edit() method.
    }

    /**
     * @inheritDoc
     */
    public function getAll(): array|Generator
    {
        return $this->taskRepository->getAll();
    }
}