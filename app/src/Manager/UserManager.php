<?php

namespace App\Manager;

use App\Entity\User;

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

    public function addUser(string $username, string $email, string $password)
    {;

        $insert = $this->pdo->prepare("INSERT INTO User (username,email,password,admin) VALUES(:username, :email, :password, 1)");
        $insert->bindValue("username", $username, \PDO::PARAM_STR);
        $insert->bindValue("email", $email, \PDO::PARAM_STR);
        $insert->bindValue("password", $password, \PDO::PARAM_STR);
        $insert->execute();

        $users = $this->pdo->prepare("SELECT * FROM User WHERE username = :username");
        $users->bindValue("username", $username, \PDO::PARAM_STR);
        $users->execute();
        $userFetch = $users->fetch();
        $_SESSION["User"] = $userFetch;
    }
}
