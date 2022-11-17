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

    public function addUser(User $username, User $password, User $email, User $admin)
    {;
        $insert = $this->pdo->prepare("INSERT INTO User (username,email,password,admin) VALUES(:username, :email, :password, :admin)");
        $insert->bindValue("username", $username, \PDO::PARAM_STR);
        $insert->bindValue("email", $email, \PDO::PARAM_STR);
        $insert->bindValue("password", $password, \PDO::PARAM_STR);
        $insert->bindValue("admin", $admin, \PDO::PARAM_STR);
        $insert->execute();
    }
}
