<?php

namespace application\controllers;

use application\core\Controller;
use application\libs\Validate;

class TasksController extends Controller
{
    const TASKS_LIMIT = 3;
    
    public function indexAction($page = 1)
    {
        $art = ($page * TasksController::TASKS_LIMIT) - TasksController::TASKS_LIMIT;
        
        $tasks = $this->model->getTasks($art, TasksController::TASKS_LIMIT);
        
        $total = $this->model->getTasksCount();
        $str_pag = ceil($total / TasksController::TASKS_LIMIT);
        
        $vars = [
            'tasks' => $tasks,
            'str_pag' => $str_pag
        ];
        
        $this->view->render('Список задач', $vars);
    }
    
    public function addAction()
    {
        if (!empty($_POST))
        {
            $name = Validate::normalString($_POST['name']);
            $email = Validate::normalString($_POST['email']);
            $text = Validate::normalString($_POST['text']);
            
            $this->model->addTask($name, $email, $text);
        }
    }
}
