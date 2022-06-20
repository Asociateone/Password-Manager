<?php

    require 'vendor/autoload.php';

    use App\Auth\Login;

    $login = new Login();

    $login->login($_POST);
