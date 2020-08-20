<?php

namespace application\configs;

class Routes
{
    public static function getRoutes()
    {
        return [
            '([0-9]+)?/?([0-9]+)?' => [
                'controller' => 'tasks',
                'action' => 'index'
            ],
            
            "admin" => [
                'controller' => 'admin',
                'action' => 'index'
            ],
            
            "admin/login" => [
                'controller' => 'admin',
                'action' => 'login'
            ],
            
            "admin/edit/([0-9]+)" => [
                'controller' => 'admin',
                'action' => 'edit'
            ],
        ];
    }
}