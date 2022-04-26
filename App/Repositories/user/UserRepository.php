<?php

namespace App\Repositories\user;

use App\Models\users\UserDTO;
use App\Repositories\user\interfaces\UserRepositoryInterface;
use Database\interfaces\DatabaseInterface;
use Generator;

class UserRepository implements UserRepositoryInterface
{
    private DatabaseInterface $db;

    /**
     * @param DatabaseInterface $db
     */
    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }


    public function insert(UserDTO $userDTO): bool
    {
        // TODO: Implement insert() method.
    }

    public function update(int $id, UserDTO $userDTO): bool
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id): bool
    {
        // TODO: Implement delete() method.
    }

    public function findUserByUsername(string $username): ?UserDTO
    {
        // TODO: Implement findUserByUsername() method.
    }

    public function findUserById(int $id): ?UserDTO
    {
        // TODO: Implement findUserById() method.
    }

    /**
     * @inheritDoc
     */
    public function getAll(): array|Generator
    {
        return $this->db->query(
            "SELECT id, 
                    username,
                    email,
                    password,
                    first_name AS firstName,
                    last_name AS lastName
                    FROM users"
        )->execute()
            ->fetch(UserDTO::class);
    }
}