<?php

namespace App\Http\user;

spl_autoload_register(function ($class){
    $base = $_SERVER['DOCUMENT_ROOT'];
    $path = explode('_',$class);
    $class = (implode('/',$path));

    $file = $base . DIRECTORY_SEPARATOR . $class . '.php';
    if (file_exists($file)){
        include_once $file;
    }
});

use App\Models\errors\ErrorDTO;
use App\Models\users\UserDTO;
use App\Service\user\UserService;
use App\Service\user\UserServiceInterface;
use Core\Binder\DataBinder;
use Core\Binder\DataBinderInterface;
use Core\Template\Template;
use Core\Template\TemplateInterface;

class UserHttpHandler
{
    private TemplateInterface $template;
    private UserServiceInterface $userService;
    protected DataBinderInterface $dataBinder;

    public function __construct()
    {
        $this->template = new Template();
        $this->userService = new UserService();
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

    public function index()
    {
        $this->render('home/index');
    }

    public function login()
    {
        if ($this->userService->isLogged()){
            $this->redirect("account.php");
        }else {
            $this->render('user/login');
        }
    }

    public function register()
    {
        $this->render('user/register');
    }

    public function account(){

        if ($this->userService->isLogged()){
            $this->render('user/account',$this->userService->currentUser());
        }else {
            $this->redirect("login.php");
        }

    }

    public function editProfile(array $formData = []){

        if ($this->userService->isLogged()){
            $this->render('user/_edit_profile',$formData);
        }else {
            $this->redirect("login.php");
        }

    }

    public function all()
    {
        $this->render('user/all', $this->userService->getAll());
    }

    public function processRegistration($formData) : string
    {
        $userService = new UserService();

        try {
            $user = $this->getDataBinder()->bind($formData, UserDTO::class);
        }catch (\Exception $exception){
            return $exception->getMessage();
        }

        return $userService->register($user,$formData['confirm_password']);
//        if ($userService->register($user, $formData['confirm_password'])){
//            $this->redirect("login.php");
//        }else {
//            $this->render("users/register",null,
//                new ErrorDTO("Password mismatch."));
//        }
    }

    public function processLogin($formData): string
    {
        $user = $this->userService->login($formData['username'],$formData['password']);

        $currentUser = $this->dataBinder->bind($user, UserDTO::class);

        if (null !== $user){
            $_SESSION['id'] = $user->getId();
            return "Successfully Logged in user id = " . $_SESSION['id'];
//           $this->redirect("account.php");
        }else{
            return "Error!";
//            $this->render("user/login",$currentUser,
//            new ErrorDTO("Wrong username or password!"));
        }
    }


}
