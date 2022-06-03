<?php 

    namespace App\Features;

    class StringCheck
    {
        public static function inputTest($input): String
        {
            $input = strtolower($input);
            $input = htmlspecialchars($input);
            $input = trim($input);

            return $input;
        }
    }
