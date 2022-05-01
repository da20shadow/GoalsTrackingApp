<?php

namespace App\Service\user;

spl_autoload_register(function ($class){
    $base = $_SERVER['DOCUMENT_ROOT'];
    $path = explode('_',$class);
    $class = (implode('/',$path));

    $file = $base . DIRECTORY_SEPARATOR . $class . '.php';
    if (file_exists($file)){
        include_once $file;
    }
});

use App\Models\users\UserDTO;
use App\Repositories\user\interfaces\UserRepositoryInterface;
use App\Repositories\user\UserRepository;
use App\Service\encryption\ArgonEncryptionService;
use App\Service\encryption\interfaces\EncryptionInterface;
use Database\Connect;
use Database\PDODatabase;
use Generator;

class UserService implements UserServiceInterface
{

    private UserRepositoryInterface $userRepository;
    private EncryptionInterface $encryptionService;
    private PDODatabase $db;

    public function __construct()
    {
        $conn = new Connect();
        $this->db = $conn::connect();
        $this->userRepository = new UserRepository($this->db);
        $this->encryptionService = new ArgonEncryptionService();
    }


    public function register(UserDTO $userDTO, string $confirmPassword): string
    {
        if ($userDTO->getPassword() !== $confirmPassword){
            return "Error! Passwords doesn't match!";
        }

        if (null !== $this->userRepository->findUserByUsername($userDTO->getUsername())){
            return "Error! This Username Already Registered!";
        }

        if (null !== $this->userRepository->findUserByEmail($userDTO->getEmail())){
            return "Error! This Email Already Registered!";
        }

        $this->encryptPassword($userDTO);

        return $this->userRepository->insert($userDTO);
    }

    public function login(string $username, string $password): ?UserDTO
    {
        $userFormDB = $this->userRepository->findUserByUsername($username);

        if (null === $userFormDB){
            return null;
        }
        if (false === $this->encryptionService->verify($password,$userFormDB->getPassword())){
            return null;
        }
        return $userFormDB;
    }

    public function currentUser(): ?UserDTO
    {
        if (empty($_SESSION['id'])){
            return null;
        }
        return $this->userRepository->findUserById(intval($_SESSION['id']));
    }

    public function isLogged(): bool
    {
        if(!$this->currentUser()){
            return false;
        }
        return true;
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