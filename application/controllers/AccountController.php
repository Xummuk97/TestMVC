<?php

namespace application\controllers;

use application\core\Controller;
use application\libs\Db;

class AccountController extends Controller
{
    public function loginAction()
    {
        $db = new Db;
        $params = [
            'id' => 2
        ];
        \application\libs\Dev::debug($db->row('SELECT name FROM users WHERE id = :id', $params));
        
        $vars = [ 'name' => 'Andrey', 'age' => 20 ];
        $this->view->render('Главная страница', $vars);
    }
}
