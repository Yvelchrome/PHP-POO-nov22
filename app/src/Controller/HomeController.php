<?php

namespace App\Controller;

use App\Factory\PDOFactory;
use App\Manager\PostManager;
use App\Route\Route;
use App\Manager\UserManager;

class HomeController extends AbstractController
{
    #[Route('/home', name: "homepage", methods: ["GET"])]
    public function home()
    {
        session_start();
        $this->render("home.php", [], "connecté");
    }
    

    /**
     * @param $id
     * @param $truc
     * @param $machin
     * @return void
     */
    #[Route('/post/{id}/{truc}/{machin}', name: "francis", methods: ["GET"])]
    public function showOne($id, $truc, $machin)
    {
        var_dump($id, $truc);
    }
}
