<?php

    require 'vendor/autoload.php';

    use App\Server\MySQL;

    $mysql = new MySQL();

    $mysql->createAccountTable();

    $mysql->createUserTable();
