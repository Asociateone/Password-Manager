<?php

    namespace App\Features;

    class PasswordCheck
    {
        public static function passwordCheck(String $password): String
        {
            $password = htmlspecialchars($password);
            $password = trim($password);

            return $password;
        }
    }
