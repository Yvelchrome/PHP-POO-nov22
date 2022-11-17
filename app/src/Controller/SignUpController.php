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
        $this->render("signUp.php", [], "inscription");
    }

    public function executeAdd()
    {
        $newUser = new User();
        $manager = new UserManager(new PDOFactory());
    }
}
