<?php

namespace application\libs;

class Validate 
{
    public static function normalString($string)
    {
        return trim(htmlspecialchars($string));
    }
    
    public static function findPostVariable($name)
    {
        return isset($_POST[$name]) && !empty($_POST[$name]);
    }
    
    public static function validateEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}
