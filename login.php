<?php

    require 'vendor/autoload.php';

    use App\Auth\Login;

    $hello = new Login();

    $hello->login($_POST);
