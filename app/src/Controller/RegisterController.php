<?php

namespace App\Controller;

use App\Entity\User;
use App\Manager\UserManager;
use App\Factory\PDOFactory;
use App\Route\Route;

class RegisterController extends AbstractController
{
    #[Route("/", name: "register", methods: ["GET"])]
    public function register()
    {
        $this->render("register.php", [], "Inscription");
    }
    #[Route("/", name: "register", methods: ["POST"])]
    public function executeAdd()
    {   
        $newUser = new User();
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = hash("sha512", $_POST["password"]);
        $admin = $_POST["admin"];
        $newUser->setUsername($username);
        $newUser->setEmail($email);
        $newUser->setPassword($password);
        $newUser->setAdmin($admin);
        $manager = new UserManager(new PDOFactory());
        $manager->addUser($newUser);

        header("Location: /home");
    }
}
