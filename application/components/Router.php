<?php

class Router 
{
    private $routes;
    
    public function __construct() 
    {
        $routes_path = ROOT."/application/configs/Routes.php";
        $this->routes = include($routes_path);
    }
    
    /**
     * Return request string
     * 
     * @return string
     */
    private function GetURI()
    {
        if (!empty($_SERVER['REQUEST_URI']))
        {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }
    
    /**
     * Передача управления в роутер
     * 
     * @return void
     */ 
    public function Run()
    {
        # Получить строку запроса
        $uri = $this->GetURI();
        
        # Проверить наличие такого запроса в Routes.php
        foreach ($this->routes as $uri_pattern => $path)
        {
            # Сравниванием $uri_pattern и $uri
            if (preg_match("~$uri_pattern~", $uri))
            {
                # Определить какой контроллер
                # и экшен обрабатывают запрос
                $segments = explode('/', $path);
                
                # Получаем имя контроллера
                $controller_name = array_shift($segments).'Controller';
                
                # Получаем название экшена
                $action_name = 'Action'.array_shift($segments);
                
                # Подключить файл класса-контроллера
                $controller_file = ROOT.'/application/controllers/' .
                        $controller_name . '.php';
                
                if (file_exists($controller_file))
                {
                    include_once $controller_file;
                }
                
                # Создать объект, вызвать метод (т.е. экшен)
                $controller_object = new $controller_name;
                $result = $controller_object->$action_name();
                
                if ($result != null)
                {
                    break;
                }
            }
        }
    }
}
