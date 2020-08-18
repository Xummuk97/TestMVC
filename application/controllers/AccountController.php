<?php

namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller
{
    public function loginAction()
    {
        $vars = [ 'name' => 'Andrey', 'age' => 20 ];
        $this->view->render('Главная страница', $vars);
    }
}
