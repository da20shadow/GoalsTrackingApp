<?php

namespace App\Service\goal;

use App\Models\goals\GoalDTO;
use App\Repositories\goals\interfaces\GoalRepositoryInterface;
use Generator;

class GoalService implements GoalServiceInterface
{
    private GoalRepositoryInterface $goalRepository;

    /**
     * @param GoalRepositoryInterface $goalRepository
     */
    public function __construct(GoalRepositoryInterface $goalRepository)
    {
        $this->goalRepository = $goalRepository;
    }


    public function create(GoalDTO $goalDTO): bool
    {
        // TODO: Implement create() method.
    }

    /**
     * @inheritDoc
     */
    public function getAll(): array|Generator
    {
        return $this->goalRepository->all();
    }
}