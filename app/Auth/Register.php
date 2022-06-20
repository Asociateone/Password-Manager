<?php

namespace App\Auth;

use App\Server\MySQL;
use Exception;
use App\Features\PasswordCheck;
use App\Features\StringCheck;

class Register
{
    private object $conn;

    public function __construct()
    {
        $this->conn = new MySQL();
    }

    public function register(string $username, string $password, string $email): void
    {
        $this->conn->connect();

        $username = StringCheck::inputTest($username);
        $password = PasswordCheck::passwordCheck($password);
        $email = StringCheck::inputTest($email);

        self::checkIfUsernameAlreadyExist($username);
        self::checkIfEmailAlreadyExist($email);

        $arr = self::passwordHasher($password);

        $query = "INSERT INTO Users (
            `Username`, `Password`, `Email`, `Salt`
            ) VALUES (
                '$username', '$arr[password]', '$email', '$arr[salt]'
            )";

        $this->conn->sendQuery($query);

        $this->conn->disconnect();
    }

    private function passwordHasher(string $password): array
    {
        $salt = random_bytes(12);
        $salt = bin2hex($salt);

        $password .= $salt;
        $password = password_hash($password, PASSWORD_DEFAULT);

        return ['salt' => $salt, 'password' => $password];
    }

    private function checkIfUsernameAlreadyExist(string $username)
    {
        $query = "SELECT * FROM Users WHERE `Username` = '$username'";

        $user = $this->conn->sendQuery($query);

        if ($user->fetch_assoc()) {
            throw new Exception('Username already exist');
        }
    }

    private function checkIfEmailAlreadyExist(string $email): void
    {
        $query = "SELECT * FROM Users WHERE `Email` = '$email'";

        $user = $this->conn->sendQuery($query);

        if ($user->fetch_assoc()) {
            throw new Exception('Email already exist');
        }
    }
}
