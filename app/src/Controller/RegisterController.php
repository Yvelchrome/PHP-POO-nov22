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
        $newUser->setUsername($_POST["username"]);
        $newUser->setEmail($_POST["email"]);
        $newUser->setPassword(hash("sha512", $_POST["password"]));
        $newUser->setAdmin($_POST["admin"]);
        $manager = new UserManager(new PDOFactory());
        $manager->addUser($newUser);

        header("Location: /home");
    }
}
