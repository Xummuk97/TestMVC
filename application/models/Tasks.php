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
    
    public function getTasks($page, $limit)
    {
        $result = $this->db->row("SELECT * FROM tasks LIMIT $page,$limit");
        return $result;
    }
    
    public function getTasksCount()
    {
        $result = $this->db->column('SELECT COUNT(*) FROM tasks');
        return $result[0];
    }
}
