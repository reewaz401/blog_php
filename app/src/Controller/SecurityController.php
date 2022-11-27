<?php

namespace App\Controller;

use App\Factory\PDOFactory;
use App\Manager\UserManager;
use App\Entity\User;
use App\Route\Route;
session_start();

class SecurityController extends AbstractController
{
    #[Route('/login', name: "login", methods: ["POST"])]
    public function login()
    {
        $formUsername = $_POST['username'];
        $formPwd = $_POST['psw'];

        $userManager = new UserManager(new PDOFactory());
        $user = $userManager->getByUsername($formUsername);

        if (!$user) {
            header("Location: /?error=notfound");
            exit;
        }
        if ($user->passwordMatch($formPwd)) {
            $_SESSION["user_id"]=$user->getId();
            $this->render("user/home.php", [
                "message" => "je suis un message"
            ],
                "titre de la page");
        }
        header("Location: /?error=notfound");
        exit;

    }
    #[Route('/registerUser', name: "registerUser", methods: ["POST"])]
    public function registerUser()
    {
        $user = new User();
        $user->setUsername($_POST["username"]);
        $user->setEmail($_POST["email"]);
        $user->setGender($_POST["gender"]);
        $user->setRoles($_POST["roles"]);
        $user->setPassword($_POST["psw"]); 

        $userManager = new UserManager(new PDOFactory());
        $userMang = $userManager->insertUser($user);
        header('location:/');
    }
    #[Route('/home', name: "home", methods: ["GET"])]
    public function home()
    {

        $this->render("home.php", [

        ], "Home");
    }
    #[Route('/signup', name: "signup", methods: ["GET"])]
    public function signup()
    {
        $this->render("signup.php", [

        ], "Sign Up");
    }

    #[Route('/signin', name: "signin", methods: ["GET"])]
    public function signin()
    {
        $this->render("signin.php", [
        ], "Sign In");
    }
    #[Route('/logout', name: "logout", methods: ["GET"])]
    public function logout()
    {
       session_destroy();
        $this->render("signin.php", [
        ], "Sign In");
    }
   

    
}
