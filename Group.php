<?php

    require 'vendor/autoload.php';

    use App\Manager\UserPasswordManager;

    $password = new UserPasswordManager();

    $password->addAccount($_REQUEST);
