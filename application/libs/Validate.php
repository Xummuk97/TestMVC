<?php

namespace application\libs;

class Validate 
{
    public static function normalString($string)
    {
        return trim(htmlspecialchars($string));
    }
}
