<?php

namespace App\Http\user;

use App\Http\interfaces\BaseHttpHandler;
use App\Models\errors\ErrorDTO;
use App\Models\users\UserDTO;
use App\Service\user\UserServiceInterface;

class UserHttpHandler extends BaseHttpHandler
{

    public function index(UserServiceInterface $userService)
    {
        $this->render('home/index');
    }

    public function login(UserServiceInterface $userService)
    {
        $this->render('user/login');
    }

    public function register()
    {
        $this->render('user/register');
    }

    public function all(UserServiceInterface $userService)
    {
        $this->render('user/all', $userService->getAll());
    }

    public function processRegistration(UserServiceInterface $userService, $formData)
    {
        $user = $this->dataBinder->bind($formData, UserDTO::class);

        if ($userService->register($user, $formData['confirm_password'])){
            $this->redirect("login.php");
        }else {
            $this->render("users/register",null,
                new ErrorDTO("Password mismatch."));
        }
    }


}