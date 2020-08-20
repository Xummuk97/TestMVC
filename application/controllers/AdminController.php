<?php

namespace application\controllers;

use application\core\Controller;
use application\libs\Validate;
use application\controllers\TasksController;

class AdminController extends Controller
{
    const ERROR_NO_LOGIN = (1 << 0);
    const ERROR_NO_PASSWORD = (1 << 1);
    const ERROR_INCORRECT_DATA = (1 << 2);
    
    private function redirectToLogin()
    {
        if (!isset($_SESSION['admin']))
        {
            $this->view->redirect('/admin/login');
        }
    }
    
    public function loginAction()
    {
        $_SESSION['admin'] = null;
        
        $flags = $this->loginPostProcessing();
        
        if ($flags == 0)
        {
            $_SESSION['admin'] = 1;
            $this->view->redirect('/admin');
        }
        
        $vars = [
            'flags' => $flags,
        ];
        
        $this->view->render('Вход');
    }
    
    private function loginPostProcessing()
    {
        if (!empty($_POST))
        {
            $flags = 0;
            
            if (!Validate::findPostVariable('login'))
            {
                $flags |= AdminController::ERROR_NO_LOGIN;
            }
            
            if (!Validate::findPostVariable('password'))
            {
                $flags |= AdminController::ERROR_NO_LOGIN;
            }
            
            $name = Validate::normalString($_POST['login']);
            $password = Validate::normalString($_POST['password']);
            
            if ($name != 'admin' || $password != '123')
            {
                $flags |= AdminController::ERROR_INCORRECT_DATA;
            }
            
            return $flags;
        }
        
        return -1;
    }
    
    public function indexAction()
    {
        $this->redirectToLogin();
        
        $this->indexPostProcessing();
        $tasks = $this->model->getTasks();
        
        $vars = [
            'tasks' => $tasks,
        ];
        
        $this->view->render('Панель администратора', $vars);
    }
    
    private function indexPostProcessing()
    {
        if (!empty($_POST))
        {
            $id = $_POST['task_id'];
            $action = $_POST['actions'];
            
            switch ($action)
            {
                case 'Редактировать':
                {
                    $this->view->redirect('/admin/edit/' . $id);
                    break;
                }
                
                case 'Удалить':
                {
                    $this->model->deleteTask($id);
                    break;
                }
            }
            
            $this->view->redirect('/admin');
        }
    }
    
    public function editAction($id)
    {
        $this->redirectToLogin();
        
        $flags = $this->editPostProcessing($id);
        $task = $this->model->getTask($id);
        
        $vars = [
            'task' => $task,
            'flags' => $flags,
        ];
        
        $this->view->render('Редактировать запись', $vars);
    }
    
    private function editPostProcessing($id)
    {
        if (!empty($_POST))
        {
            $flags = 0;
            
            if (!Validate::findPostVariable('name'))
            {
                $flags |= TasksController::ERROR_NO_NAME;
            }
            
            if (!Validate::findPostVariable('email'))
            {
                $flags |= TasksController::ERROR_NO_EMAIL;
            }
            else
            {
                if (!Validate::validateEmail($_POST['email']))
                {
                    $flags |= TasksController::ERROR_NO_VALIDE_EMAIL;
                }
            }
            
            if (!Validate::findPostVariable('text'))
            {
                $flags |= TasksController::ERROR_NO_TEXT;
            }
            
            /* WHAT!? if (!Validate::findPostVariable('done'))
            {
                $flags |= TasksController::ERROR_NO_DONE;
            }*/
            
            if ($flags != 0)
            {
                return $flags;
            }
            
            $id = $_POST['id'];
            $name = Validate::normalString($_POST['name']);
            $email = Validate::normalString($_POST['email']);
            $text = Validate::normalString($_POST['text']);
            $done = Validate::normalString($_POST['done']);
            
            $this->model->updateTask($id, $name, $email, $text, $done);
            $this->view->redirect('/admin');
        }
        
        return 0;
    }
}
