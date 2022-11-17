<?php

namespace App\Controller;

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
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = hash("sha512", $_POST["password"]);
        $admin = $_POST["admin"];
        $manager = new UserManager(new PDOFactory());
        $manager->addUser($username, $email, $password, $admin);

        $this->render("login.php", [], "Connexion");
    }
}
