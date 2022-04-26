<?php

namespace App\Repositories\user\interfaces;

use App\Models\users\UserDTO;
use Generator;

interface UserRepositoryInterface
{
    public function insert(UserDTO $userDTO) : bool;
    public function update(int $id, UserDTO $userDTO) : bool;
    public function delete(int $id) : bool;
    public function findUserByUsername(string $username) : ?UserDTO;
    public function findUserById(int $id) : ?UserDTO;

    /**
     * @return Generator|UserDTO[]
     */
    public function getAll(): array|Generator;
}