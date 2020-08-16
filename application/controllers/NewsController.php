<?php

include_once ROOT . '/application/models/News.php';

class NewsController 
{
    public function ActionIndex()
    {
        $news_list = News::GetNewsList();
        
        require_once ROOT . '/application/views/news/index.php';
        
        return true;
    }
    
    public function ActionView($id)
    {
        if ($id)
        {
            $news_item = News::GetNewsItemById($id);
            
            echo '<pre>';
            print_r($news_item);
            echo '</pre>';
        }
        return true;
    }
}
