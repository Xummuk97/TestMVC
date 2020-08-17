<?php

namespace application\core;

abstract class Controller
{
    protected $route;
    
    public function __construct($route) 
    {
        $this->route = $route;
    }
}