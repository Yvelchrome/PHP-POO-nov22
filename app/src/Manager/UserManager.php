<?php

namespace App\Manager;

use App\Entity\User;
use PDO;


class UserManager extends BaseManager
{
    /**
     * @return User[]
     */
    public function getAllUsers(): array
    {
        $query = $this->pdo->query("select * from User");

        $users = [];

        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $users[] = new User($data);
        }

        return $users;
    }

    public function addUser(string $username, string $email, string $password, int $admin)
    {;
        session_start();
        $insert = $this->pdo->prepare("INSERT INTO User (username, email, password, admin) VALUES(:username, :email, :password, :admin)");
        $insert->bindValue("username", $username, \PDO::PARAM_STR);
        $insert->bindValue("email", $email, \PDO::PARAM_STR);
        $insert->bindValue("password", $password, \PDO::PARAM_STR);
        $insert->bindValue("admin", $admin, \PDO::PARAM_INT);
        $insert->execute();

        $users = $this->pdo->prepare("SELECT * FROM User WHERE username = :username");
        $users->bindValue("username", $username, \PDO::PARAM_STR);
        $users->execute();
        $userFetch = $users->fetch(PDO::FETCH_ASSOC);
        $_SESSION["User"] = $userFetch;
    }

    public function checkUser(string $username, string $password): ?User
    {
        $checking = $this->pdo->prepare("SELECT * FROM User WHERE username = :username and password = :password");

        $checking->bindValue("username", $username, PDO::PARAM_STR);
        $checking->bindValue("password", $password, PDO::PARAM_STR);
        $checking->execute();
        $userFetch = $checking->fetch(PDO::FETCH_ASSOC);
        $_SESSION["User"] = $userFetch;

        if ($userFetch) {
            return new User($userFetch);
        }
        return null;
    }
}
