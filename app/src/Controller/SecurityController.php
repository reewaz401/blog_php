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
        $_SESSION["user_id"]=$value;
        $this->render("home.php", [
            "posts" => $posts,
            "trucs" =>  "from register",
            "machin" => 42
        ], "Sign Up");
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
        $_SESSION["user_id"] = "";
        $this->render("signin.php", [
        ], "Sign In");
    }
    #[Route('/getAllUser', name: "getAllUser", methods: ["GET"])]
    public function getAllUser()
    {
        $manger = new UserManager(new PDOFactory());
        $users = $manger->getAllUsers();
        $this->render("showUsers.php", [
            "users" => $users,
        ], "Users");
    }
    #[Route('/deleteUser', name: "deleteUser", methods: ["POST"])]
    public function deleteUser()
    {
        $userManager = new UserManager(new PDOFactory());
        $userMang = $userManager->deleteUser($_POST["id"]);

        $manger = new UserManager(new PDOFactory());
        $users = $manger->getAllUsers();
        $this->render("showUsers.php", [
            "users" => $users,
        ], "Users");
    }
    #[Route('/updateUser', name: "updateUser", methods: ["GET"])]
    public function updateUser()
    {
        // $userManager = new UserManager(new PDOFactory());
        // $userMang = $userManager->modifyUser();
        $manger = new UserManager(new PDOFactory());
        $user = $manger->getById(4);

        $this->render("updateUser.php", [
            "user" => $user,
        ], "Modify");
    }
    #[Route('/modifyUser', name: "modifyUser", methods: ["POST"])]
    public function modifyUser()
    {
        $user = new User();
        $user->setId(4);
        $user->setUsername($_POST["username"]);
        $user->setPassword($_POST["psw"]);
        $user->setRoles($_POST["roles"]);
        $user->setEmail($_POST["email"]);
        $user->setGender($_POST["gender"]);
        $manger = new UserManager(new PDOFactory());
        $manger->modifyUser($user);
        $this->render("home.php", [
            "user" => $user,
        ], "Modify");
    }
    
}
