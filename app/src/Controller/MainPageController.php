<?php

namespace App\Controller;

use App\Route\Route;
use App\Manager\UserManager;
use App\Factory\PDOFactory;

class MainPageController extends AbstractController
{
    #[Route("/login", name: "login", methods: ["POST"])]
    public function executeAdd()
    {
        $formUsername = $_POST["username"];
        $formEmail = $_POST["email"];
        $formPsw = hash("sha512", $_POST["psw"]);
        $formPswRepeat = hash("sha512", $_POST["psw-repeat"]);

        if ($formPsw === $formPswRepeat) {
            var_dump("MOD DE PASSE IDENTIQUE");
            $manager = new UserManager(new PDOFactory());
            $createUser = $manager->addUser($formUsername, $formEmail, $formPsw);
            $this->render("mainPage.php", [], "login réussi");
        }
        header("Location: /");
        exit();
    }
}
