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
        var_dump("toto");
        $formmUsername = $_POST["username"];
        $formPws = $_POST["pws"];
        $formEmail = $_POST["email"];
        $manager = new UserManager(new PDOFactory());
        var_dump($formEmail, $formmUsername, $formPws);
        $createUser = $manager->addUser($formmUsername, $formEmail, $formPws);

        die;
        $this->render("signIn.php", [], "création réussite");
    }
}
