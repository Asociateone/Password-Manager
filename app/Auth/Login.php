<?php

namespace App\Auth;

use Exception;
use App\Server\MySQL;

class Login
{
    private object $conn;

    public function __construct()
    {
        $this->conn = new MySQL();
    }

    public function login(array $user)
    {
        if (!isset($_SESSION)) {
            $this->conn->connect();

            $query = "SELECT * FROM password.Users WHERE `Username` = '$user[username]'";

            $login = $this->conn->sendQuery($query);

            $dbUser = $login->fetch_assoc();

            $this->conn->disconnect();

            if (isset($dbUser) && self::verifyPassword($user['password'], $dbUser['Password'], $dbUser['Salt'])) {
                session_start();
                $_SESSION['user'] = $dbUser;

                return header("Location: /pages/welcome.php");
            } else {
                return header("Location: /pages/home.php");
            }
        }
    }

    public function verifyPassword($password1, $password, $salt)
    {
        $password1 .= $salt;

        return password_verify($password1, $password);
    }
}
