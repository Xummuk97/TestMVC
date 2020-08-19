<?php

namespace application\configs;

class Routes
{
    public static function getRoutes()
    {
        return [
            '' => [
                'controller' => 'account',
                'action' => 'index'
            ],
            
            'account/login' => [
                'controller' => 'account',
                'action' => 'login'
            ],
        ];
    }
}