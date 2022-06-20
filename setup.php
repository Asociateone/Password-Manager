<?php

    require 'vendor/autoload.php';

    use App\Server\MySQL;

    $mysql = new MySQL('db', 'User', 'Password');

    $mysql->createAccountTable();

    $mysql->createUserTable();
