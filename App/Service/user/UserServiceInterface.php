<?php

namespace App\Service\user;

use App\Models\users\UserDTO;
use Generator;

interface UserServiceInterface
{
    public function register(UserDTO $userDTO, string $confirmPassword) : string;
    public function login(string $username, string $password) : ?UserDTO;
    public function currentUser() : ?UserDTO;
    public function isLogged() : bool;
    public function edit(UserDTO $userDTO) : bool;

    /**
     * @return Generator|UserDTO[]
     */
    public function getAll() : array|Generator;
}