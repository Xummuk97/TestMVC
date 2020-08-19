<?php

namespace application\controllers;

use application\core\Controller;
use application\libs\Validate;

class AdminController extends Controller
{
    public function indexAction()
    {
        $this->view->render('Вход администратора');
    }
    
    public function loginAction()
    {
        if (!empty($_POST))
        {
            $login = Validate::normalString($_POST['login']);
            $password = Validate::normalString($_POST['password']);
            
            if ($login == 'admin' && $password == '123')
            {
                $_SESSION['admin'] = 1;
            }
        }
    }
    
    public function logoutAction()
    {
        $_SESSION['admin'] = null;
    }
}
