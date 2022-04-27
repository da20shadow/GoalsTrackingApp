<?php

namespace App\Service\user;

use App\Models\users\UserDTO;
use App\Repositories\user\interfaces\UserRepositoryInterface;
use App\Service\encryption\interfaces\EncryptionInterface;
use Generator;

class UserService implements UserServiceInterface
{

    private UserRepositoryInterface $userRepository;
    private EncryptionInterface $encryptionService;

    /**
     * @param UserRepositoryInterface $userRepository
     * @param EncryptionInterface $encryptionService
     */
    public function __construct(UserRepositoryInterface $userRepository,
                                EncryptionInterface     $encryptionService)
    {
        $this->userRepository = $userRepository;
        $this->encryptionService = $encryptionService;
    }


    public function register(UserDTO $userDTO, string $confirmPassword): bool
    {
        if ($userDTO->getPassword() !== $confirmPassword){
            return false;
        }

        if (null !== $this->userRepository->findUserByUsername($userDTO->getUsername())){
            return false;
        }

        $this->encryptPassword($userDTO);
        return $this->userRepository->insert($userDTO);
    }

    public function login(string $username, string $password): ?UserDTO
    {
        // TODO: Implement login() method.
    }

    public function currentUser(): ?UserDTO
    {
        // TODO: Implement currentUser() method.
    }

    public function isLogged(): bool
    {
        // TODO: Implement isLogged() method.
    }

    public function edit(UserDTO $userDTO): bool
    {
        // TODO: Implement edit() method.
    }

    /**
     * @inheritDoc
     */
    public function getAll(): array|Generator
    {
        return $this->userRepository->getAll();
    }

    private function encryptPassword(UserDTO $userDTO)
    {
        $plainPassword = $userDTO->getPassword();
        $passwordHash = $this->encryptionService->hash($plainPassword);
        $userDTO->setPassword($passwordHash);
    }
}