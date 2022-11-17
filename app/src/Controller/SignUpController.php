<?php

namespace App\Controller;

use App\Manager\UserManager;
use App\Entity\User;
use App\Factory\PDOFactory;
use App\Route\Route;

class SignUpController extends AbstractController
{
    #[Route("/", name: "signup", methods: ["GET"])]
    public function signUp()
    {
        $manager = new UserManager(new PDOFactory());
        $users = $manager->getAllUsers();
        $this->render("signUp.php", ["users" => $users], "inscription");
    }

    #[Route("/login", name: "login", methods: ["POST"])]
    public function executeAdd()
    {
        $formUsername = $_POST["username"];
        $formEmail = $_POST["email"];
        $formPws = hash("sha512", $_POST["psw"]);
        $manager = new UserManager(new PDOFactory());
        $createUser = $manager->addUser($formUsername, $formEmail, $formPws);

        $this->render("signIn.php", [], "login réussi");
    }
}
