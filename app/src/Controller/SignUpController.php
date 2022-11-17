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
}
