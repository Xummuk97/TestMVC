<?php

namespace application\core;

use application\core\View;

abstract class Controller
{
    protected $route;
    protected $model;
    public $view;
    
    public function __construct($route) 
    {
        $this->route = $route;
        $this->view = new View($route);
        $this->model = $this->loadModel($route['controller']);
    }
    
    public function loadModel($name)
    {
        $model_path = 'application\models\\' . ucfirst($name);
        
        if (class_exists($model_path))
        {
            return new $model_path;
        }
    }
}