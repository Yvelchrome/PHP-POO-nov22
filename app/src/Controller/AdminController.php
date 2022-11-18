<?php

namespace App\Controller;

use App\Factory\PDOFactory;
use App\Manager\UserManager;
use App\Route\Route;


class AdminController extends AbstractController
{
    #[Route('/admin', name: "admin", methods: ["GET"])]
    public function showUserInfo()
    {
        return $this->render("admin.php", [], "Admin");
    }

    #[Route('/admin', name: "admin", methods: ["POST"])]
    public function updateUser()
    {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = hash("sha512", $_POST["password"]);
        $admin = $_POST["admin"];

        $userManager = new UserManager(new pdoFactory());
        $userManager->updateUser($username, $email, $password, $admin);

        header("Location: /admin");
    }
}
