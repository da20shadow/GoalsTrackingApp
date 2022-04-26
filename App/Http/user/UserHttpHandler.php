<?php

namespace App\Http\user;

use App\Http\interfaces\BaseHttpHandler;
use App\Service\user\UserServiceInterface;

class UserHttpHandler extends BaseHttpHandler
{

    public function index(UserServiceInterface $userService){
        $this->render('home/index');
    }

    public function login(UserServiceInterface $userService){
        $this->render('user/login');
    }

    public function register(UserServiceInterface $userService){
        $this->render('user/register');
    }

    public function all(UserServiceInterface $userService){
        $this->render('user/all',$userService->getAll());
    }


}