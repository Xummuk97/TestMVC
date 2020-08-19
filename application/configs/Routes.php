<?php

namespace application\configs;

class Routes
{
    public static function getRoutes()
    {
        return [
            '([0-9]+)?' => [
                'controller' => 'tasks',
                'action' => 'index'
            ],
            
            'tasks/add' => [
                'controller' => 'tasks',
                'action' => 'add'
            ],
            
            "admin" => [
                'controller' => 'admin',
                'action' => 'index'
            ],
            
            "admin/login" => [
                'controller' => 'admin',
                'action' => 'login'
            ],
            
            "admin/logout" => [
                'controller' => 'admin',
                'action' => 'logout'
            ],
        ];
    }
}