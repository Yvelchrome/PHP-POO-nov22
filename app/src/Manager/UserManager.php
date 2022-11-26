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

        while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
            $users[] = new User($data);
        }

        return $users;
    }

    public function addUser(User $user): ?User
    {;
        session_start();
        $insert = $this->pdo->prepare("INSERT INTO User (username, email, password, admin) VALUES(:username, :email, :password, :admin)");
        $insert->bindValue("username", $user->getUsername(), PDO::PARAM_STR);
        $insert->bindValue("email", $user->getEmail(), PDO::PARAM_STR);
        $insert->bindValue("password", $user->getPassword(), PDO::PARAM_STR);
        $insert->bindValue("admin", $user->getAdmin(), PDO::PARAM_INT);
        $insert->execute();

        $users = $this->pdo->prepare("SELECT * FROM User WHERE username = :username");
        $users->bindValue("username", $user->getUsername(), PDO::PARAM_STR);
        $users->execute();
        $userFetch = $users->fetch(PDO::FETCH_ASSOC);
        $_SESSION["User"] = $userFetch;
        return $user;
    }

    public function checkUser(User $user): ?User
    {
        $checking = $this->pdo->prepare("SELECT * FROM User WHERE username = :username and password = :password");

        $checking->bindValue("username", $user->getUsername(), PDO::PARAM_STR);
        $checking->bindValue("password", $user->getPassword(), PDO::PARAM_STR);
        $checking->execute();
        $userFetch = $checking->fetch(PDO::FETCH_ASSOC);
        $_SESSION["User"] = $userFetch;

        if ($userFetch) {
            return $user;
        }
        return null;
    }

    public function deleteUser(int $userId)
    {
        $delete = $this->pdo->prepare("DELETE FROM User WHERE userId = :userId");
        $delete->bindValue("userId", $userId, PDO::PARAM_INT);
        $delete->execute();
    }

    public function updateUser(string $username, string $email, string $password, int $admin)
    {;
        session_start();
        $insert = $this->pdo->prepare("UPDATE User SET username=:username, email=:email, password=:password, admin=:admin WHERE userId = :userId");
        $insert->bindValue("username", $username, PDO::PARAM_STR);
        $insert->bindValue("email", $email, PDO::PARAM_STR);
        $insert->bindValue("password", $password, PDO::PARAM_STR);
        $insert->bindValue("admin", $admin, PDO::PARAM_INT);
        $insert->bindValue("userId", $_SESSION["User"]["userId"], PDO::PARAM_INT);
        $insert->execute();

        $checking = $this->pdo->prepare("SELECT * FROM User WHERE userId = :userId");
        $checking->bindValue("userId", $_SESSION["User"]["userId"], PDO::PARAM_STR);
        $checking->execute();
        $userFetch = $checking->fetch(PDO::FETCH_ASSOC);
        $_SESSION["User"] = $userFetch;
    }
}
