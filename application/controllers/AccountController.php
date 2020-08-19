<?php

namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller
{
    public function indexAction()
    {
        $this->view->render('Главная');
    }
    
    public function loginAction()
    {
        if (!empty($_POST))
        {
            #\application\libs\Dev::debug($_POST);
        }
    }
}
