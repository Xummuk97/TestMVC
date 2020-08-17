<?php

namespace application\configs;

class Routes
{
    public static function getRoutes()
    {
        return [
            '' => [
                'controller' => 'main',
                'action' => 'index'
            ],
            
            'account/login' => [
                'controller' => 'account',
                'action' => 'login'
            ],

            'news/show' => [
                'controller' => 'news',
                'action' => 'show'
            ]
        ];
    }
}