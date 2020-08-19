<?php

namespace application\configs;

class Db 
{
    public static function getSettings()
    {
        return [
            'host' => 'localhost',
            'dbname' => 'test',
            'user' => 'root',
            'pass' => ''
        ];
    }
}
