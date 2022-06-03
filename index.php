<?php

    require 'vendor/autoload.php';

    use App\Auth\Register;

    $register = new Register();

    $register->register($_REQUEST['username'], $_REQUEST['password'], $_REQUEST['email']);
