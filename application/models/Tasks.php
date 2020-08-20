<?php

namespace application\models;

use application\core\Model;

class Tasks extends Model
{
    public function addTask($name, $email, $text)
    {
        $vars = [
            'name' => $name,
            'email' => $email,
            'text' => $text
        ];
        $this->db->query('INSERT INTO tasks (name, email, text) VALUES (:name, :email, :text)', $vars);
    }
    
    public function getTasks($page, $limit, $sort)
    {
        $sort_string = "";
        
        switch ($sort)
        {
            case 0:
            {
                $sort_string = 'name';
                break;
            }
            
            case 1:
            {
                $sort_string = 'email';
                break;
            }
            
            case 2:
            {
                $sort_string = 'done';
                break;
            }
        }
        
        $result = $this->db->row("SELECT * FROM tasks ORDER BY $sort_string DESC LIMIT $page,$limit");
        return $result;
    }
    
    public function getTasksCount()
    {
        $result = $this->db->column('SELECT COUNT(*) FROM tasks');
        return $result;
    }
}
