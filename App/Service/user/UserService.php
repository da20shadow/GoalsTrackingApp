<?php

namespace App\Service\user;

use App\Models\users\UserDTO;
use App\Repositories\user\interfaces\UserRepositoryInterface;
use App\Repositories\user\UserRepository;
use App\Service\encryption\ArgonEncryptionService;
use App\Service\encryption\interfaces\EncryptionInterface;
use Database\PDODatabase;
use Generator;
use JetBrains\PhpStorm\Pure;
use PDO;
use PDOException;

class UserService implements UserServiceInterface
{

    private UserRepositoryInterface $userRepository;
    private EncryptionInterface $encryptionService;

    public function __construct()
    {
        $dbInfo = parse_ini_file('Config/db.ini');
        $pdo = null;
        try {

            $pdo = new PDO($dbInfo['dsn'],$dbInfo['user'],$dbInfo['pass']);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }catch (PDOException $err){
            echo $err->getMessage();
            throw new PDOException($err->getMessage());
        }
        $db = new PDODatabase($pdo);

        $this->userRepository = new UserRepository($db);
        $this->encryptionService = new ArgonEncryptionService();
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