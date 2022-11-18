<?php

namespace App\Controller;

use App\Route\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: "homepage", methods: ["GET"])]
    public function home()
    {
        session_start();

        $this->render("home.php", [], "Home");
    }
}
