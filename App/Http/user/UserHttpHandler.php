<?php

namespace App\Http\user;

use App\Http\interfaces\BaseHttpHandler;
use App\Models\errors\ErrorDTO;
use App\Models\users\UserDTO;
use App\Service\user\UserService;
use App\Service\user\UserServiceInterface;
use Core\Binder\DataBinder;
use Core\Binder\DataBinderInterface;
use Core\Template\Template;
use Core\Template\TemplateInterface;
use JetBrains\PhpStorm\Pure;

class UserHttpHandler
{
    private TemplateInterface $template;
    protected DataBinderInterface $dataBinder;

    #[Pure] public function __construct()
    {
        $this->template = new Template();
        $this->dataBinder = new DataBinder();
    }

    /**
     * @return DataBinderInterface
     */
    protected function getDataBinder(): DataBinderInterface
    {
        return $this->dataBinder;
    }

    public function render(string $templateName, $data = null, $error = null): void
    {
        $this->template->render($templateName, $data, $error);
    }

    public function redirect(string $url): void
    {
        header("Location: $url");
    }

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

    public function processRegistration($formData) : string
    {
        $userService = new UserService();
        $user = $this->getDataBinder()->bind($formData, UserDTO::class);

        if ($userService->register($user,$formData['confirm_password'])){
            return "Successfully Registered!";
        }else{
            return "Error!";
        }
//        if ($userService->register($user, $formData['confirm_password'])){
//            $this->redirect("login.php");
//        }else {
//            $this->render("users/register",null,
//                new ErrorDTO("Password mismatch."));
//        }
    }


}
