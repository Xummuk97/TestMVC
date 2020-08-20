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
    
    public function updateTask($id, $name, $email, $text, $done, $edit)
    {
        $params = [
            'id' => $id,
            'name' => $name,
            'email' => $email,
            'text' => $text,
            'done' => $done,
            'edit' => $edit,
        ];
        
        $this->db->query('UPDATE tasks SET name = :name, email = :email, text = :text, done = :done, edit = :edit WHERE id = :id', 
                $params);
    }
}
