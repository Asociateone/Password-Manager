<?php

    require 'vendor/autoload.php';

    use App\Server\MySQL;

    $mysql = new MySQL('localhost:8889', 'root', 'root');

    $mysql->createAccountTable();
