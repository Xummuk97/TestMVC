<?php

namespace application\models;

use application\core\Model;

class Admin extends Model
{
    public function getTasks()
    {
        $result = $this->db->row("SELECT * FROM tasks");
        return $result;
    }
    
    public function getTask($id)
    {
        $params = [
            'id' => $id,
        ];
        
        $result = $this->db->row('SELECT * FROM tasks WHERE id = :id', $params);
        return $result[0];
    }
    
    public function deleteTask($id)
    {
        $params = [
            'id' => $id,
        ];
        
        $this->db->query("DELETE FROM tasks WHERE id = :id", $params);
    }
    
    public function updateTask($id, $name, $email, $text, $done)
    {
        $params = [
            'id' => $id,
            'name' => $name,
            'email' => $email,
            'text' => $text,
            'done' => $done,
        ];
        
        $this->db->query('UPDATE tasks SET name = :name, email = :email, text = :text, done = :done WHERE id = :id', 
                $params);
    }
}
