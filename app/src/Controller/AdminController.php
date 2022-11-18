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
        session_start();
        if (isset($_SESSION["User"])) {
            return $this->render("admin.php", [], "Admin");
        } else {
            header("Location: /login");
        }
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

    #[Route('/admin/userList', name: "userList", methods: ["GET"])]
    public function showUserlist()
    {
        session_start();
        if (isset($_SESSION["User"])) {
            if ($_SESSION["User"]["admin"] == 1) {
                $userManager = new UserManager(new pdoFactory());
                $users = $userManager->getAllUsers();
                $this->render("adminUserList.php", ["users" => $users], "Admin");
            } else {
                header("Location: /admin");
            }
        } else {
            header("Location: /login");
        }
    }

    #[Route('/admin/userList', name: "userList", methods: ["POST"])]
    public function deleteUser()
    {
        $userId = $_POST["userId"];

        $userManager = new UserManager(new pdoFactory());
        $userManager->deleteUser($userId);
        header("Location: /admin/userList");
    }
}
