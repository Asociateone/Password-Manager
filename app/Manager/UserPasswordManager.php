<?php

namespace App\Manager;

use App\Server\MySQL;
use App\Features\PasswordCheck;
use App\Features\StringCheck;

class UserPasswordManager
{
    private object $conn;

    public function __construct()
    {
        $this->conn = new Mysql();
    }

    public function addAccount()
    {
        $website = StringCheck::InputTest($_REQUEST['website']);
        $loginName = StringCheck::InputTest($_REQUEST['loginName']);
        $password = PasswordCheck::passwordCheck($_REQUEST['password']);
        $id = $_SESSION['user']['ID'];
        $query = "INSERT INTO User_Accounts (`User_id`, `Username`, `Password`, `Website`) 
            VALUES (
                '$id',
                '$loginName',
                '$password',
                '$website'
            )";

        $this->conn->sendQuery($query);

        return header("Location: /pages/welcome.php");
    }

    public function getAccounts()
    {
        session_start();
        var_dump($_SESSION);
    }
}
