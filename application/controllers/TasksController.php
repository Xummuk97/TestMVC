<?php

namespace application\controllers;

use application\core\Controller;
use application\libs\Validate;

class TasksController extends Controller
{
    const TASKS_LIMIT = 3;
    
    const ERROR_NO_NAME = (1 << 0);
    const ERROR_NO_EMAIL = (1 << 1);
    const ERROR_NO_TEXT = (1 << 2);
    const ERROR_NO_VALIDE_EMAIL = (1 << 3);
    const ERROR_NO_DONE = (1 << 4);
    
    const BASE = TasksController::ERROR_NO_DONE;
    
    const SUCCESS_ADD = (TasksController::BASE << 1);
    
    public function indexAction($page = 1, $sort = 0, $desc = 0)
    {
        $_SESSION['admin'] = null;
        
        $flags = $this->indexPostProcessing($page, $sort);
        
        $art = ($page * TasksController::TASKS_LIMIT) - TasksController::TASKS_LIMIT;
        
        $tasks = $this->model->getTasks($art, TasksController::TASKS_LIMIT, $sort, $desc);
        
        $total = $this->model->getTasksCount();
        $count_pages = ceil($total / TasksController::TASKS_LIMIT);
        
        $vars = [
            'tasks' => $tasks,
            'count_pages' => $count_pages,
            'flags' => $flags,
            'page' => $page,
            'sort' => $sort,
            'desc' => $desc
        ];
        
        $this->view->render('Список задач', $vars);
    }
    
    private function indexPostProcessing($page, $sort)
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
            
            if ($flags != 0)
            {
                return $flags;
            }
            
            $name = Validate::normalString($_POST['name']);
            $email = Validate::normalString($_POST['email']);
            $text = Validate::normalString($_POST['text']);
            
            $this->model->addTask($name, $email, $text);
            
            unset($_POST);
            return TasksController::SUCCESS_ADD;
        }
        
        return 0;
    }
}
