<?php

include_once ROOT . '/application/models/News.php';

class NewsController 
{
    public function ActionIndex()
    {
        echo 'Index<br>';
        
        $news_list = News::GetNewsList();
        
        echo '<pre>';
        print_r($news_list);
        echo '</pre>';
        
        return true;
    }
    
    public function ActionView($id)
    {
        if ($id)
        {
            echo 'View<br>';
            
            $news_item = News::GetNewsItemById($id);
            
            echo '<pre>';
            print_r($news_item);
            echo '</pre>';
        }
        return true;
    }
}
