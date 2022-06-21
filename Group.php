<?php

    require 'vendor/autoload.php';

    use App\Manager\UserPasswordManager;
    
    session_start();

    $password = new UserPasswordManager();

    $password->addAccount();
