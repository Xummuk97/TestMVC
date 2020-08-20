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
    
    public function getTasks($page, $limit, $sort, $desc)
    {
        $sort_string = "";
        $desc_string = "";
        
        switch ($sort)
        {
            case 1:
            {
                $sort_string = 'ORDER BY name';
                break;
            }
            
            case 2:
            {
                $sort_string = 'ORDER BY email';
                break;
            }
            
            case 3:
            {
                $sort_string = 'ORDER BY done';
                break;
            }
        }
        
        switch ($desc)
        {
            case 1:
            {
                if (!empty($sort_string))
                {
                    $desc_string = 'DESC';
                }
                break;
            }
        }
        
        $result = $this->db->row("SELECT * FROM tasks $sort_string $desc_string LIMIT $page,$limit");
        return $result;
    }
    
    public function getTasksCount()
    {
        $result = $this->db->column('SELECT COUNT(*) FROM tasks');
        return $result;
    }
}
