<?php

# Front Controller

# Отображение ошибок
ini_set('display_errors', 1);
error_reporting(E_ALL);

# Подключение файлов
define('ROOT', dirname(__FILE__));
require_once ROOT.'/application/components/Router.php';
require_once ROOT.'/application/components/Db.php';

# Соединение с БД

# Вызов Router
$router = new Router();
$router->Run();