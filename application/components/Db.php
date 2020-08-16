<?php

class Db 
{
    public static function GetConnection()
    {
        $params_path = ROOT . '/application/configs/Db.php';
        $params = include($params_path);
        
        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        $db = new PDO($dsn, $params['user'], $params['password']);
        
        return $db;
    }
}
