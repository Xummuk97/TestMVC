<?php


class NewsController 
{
    public function ActionIndex()
    {
        echo 'Список новостей';
        return true;
    }
    
    public function ActionView($category, $id)
    {
        echo "Category: $category<br>";
        echo "Id: $id<br>";
        return true;
    }
}
