<?php

namespace App\Server;

use mysqli;

class MySQL
{
    private string $host;
    private string $username;
    private string $password;
    private string $database;
    private object $conn;

    public function connect()
    {
        return $this->conn = new mysqli('db', 'User', 'Password', 'Password_Manager');
    }

    public function disconnect()
    {
        mysqli_close($this->conn);
    }

    public function createDatabase($databaseName)
    {
        $query = "CREATE DATABASE $databaseName";

        return self::sendQuery($query);
    }

    public function createUserTable()
    {
        $query = "CREATE TABLE Users (
            ID int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            Username varchar(200) NOT NULL,
            Password varchar(255) NOT NULL,
            Salt varchar(200) NOT NULL,
            Email varchar(200) NOT NULL
        ) ";

        return self::sendQuery($query);
    }

    public function createAccountTable()
    {
        $query = "CREATE TABLE User_Accounts (
            ID int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            User_id int(11) NOT NULL,
            Username varchar(200) NOT NULL,
            Password varchar(255) NOT NULL,
            Email varchar(200) NOT NULL
        ) ";

        return self::sendQuery($query);
    }

    public function sendQuery($query)
    {
        self::connect();

        try {
            return mysqli_query($this->conn, $query);
        } catch (\Exception $e) {
            throw($e);
        }

        self::disconnect();
    }
}
