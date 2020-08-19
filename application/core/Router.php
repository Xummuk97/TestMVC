<?php

namespace application\core;

class Router
{
    protected $routes = [];
    protected $params = [];
    
    public function __construct() 
    {
        $routes_date = \application\configs\Routes::getRoutes();
        
        foreach ($routes_date as $key => $value) 
        {
            $this->add($key, $value);
        }
    }
    
    public function add($route, $params)
    {
        $route = "#^$route$#";
        $this->routes[$route] = $params;
    }
    
    public function match()
    {
        $uri = trim($_SERVER['REQUEST_URI'], '/');
        
        foreach ($this->routes as $route => $params) 
        {
            if (preg_match($route, $uri, $matches))
            {
                \application\libs\Dev::debug($matches);
                $this->params = $params;
                return true;
            }
        }
        
        return false;
    }
    
    public function run()
    {
        if ($this->match())
        {
            $path = 'application\controllers\\' 
                    . ucfirst($this->params['controller']) 
                    . 'Controller';
            
            if (class_exists($path))
            {
                $action = $this->params['action'] . 'Action';
                
                if (method_exists($path, $action))
                {
                    $controller = new $path($this->params);
                    $controller->$action();
                }
                else
                {
                    echo "Не найден метод (Action): $action";
                }
            }
            else
            {
                echo "Не найден класс (Файл, где он расположен): $path";
            }
        }
        else
        {
            echo 'Маршрут не найден';
        }
    }
}