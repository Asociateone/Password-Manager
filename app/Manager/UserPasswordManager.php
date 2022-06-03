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
        $this->conn = new Mysql('localhost:8889', 'root', 'root');
    }

    public function addAccount($credentials)
    {
        $this->conn->connect();

        $website = StringCheck::InputTest($credentials['website']);
        $loginName = StringCheck::InputTest($credentials['loginName']);
        $passwowrd = PasswordCheck::passwordCheck($credentials['password']);

        var_dump('hello world');
    }
}
