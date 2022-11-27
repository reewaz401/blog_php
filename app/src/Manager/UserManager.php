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

    public function getByUsername(string $username): ?User
    {
        $query = $this->pdo->prepare("SELECT * FROM User WHERE username = :username");
        $query->bindValue("username", $username, \PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetch(\PDO::FETCH_ASSOC);

        if ($data) {
            return new User($data);
        }

        return null;
    }

    public function insertUser(User $user)
    {
        $query = $this->pdo->prepare("INSERT INTO User (password, username, email, gender, roles) VALUES (:password, :username, :email, :gender, :roles)");
        $query->bindValue("password", $user->getPassword(), \PDO::PARAM_STR);
        $query->bindValue("username", $user->getUsername(), \PDO::PARAM_STR);
        $query->bindValue("email", $user->getEmail(), \PDO::PARAM_STR);
        $query->bindValue("gender", $user->getGender(), \PDO::PARAM_STR);
        $query->bindValue("roles", $user->getRoles(), \PDO::PARAM_STR);
        $queryy = $query->execute();
        $_SESSION["user_id"] =  $this->pdo->lastInsertId();
    }
    public function deleteUser($userId)
    {
        $query = $this->pdo->prepare("DELETE FROM User WHERE id =  $userId");
        $query->execute();

    }
}
