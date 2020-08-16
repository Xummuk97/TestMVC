<?php

class News 
{
    /**
     * Returns signe news item with specified id
     * 
     * @param integer $id
     * 
     * @return row News Item
     */
    public static function GetNewsItemById($id)
    {
        $id = intval($id);
        
        if ($id)
        {
            $db = Db::GetConnection();
            
            $result = $db->query("SELECT * FROM news WHERE id = $id");
            $result->setFetchMode(PDO::FETCH_ASSOC);
            
            $news_item = $result->fetch();
            
            return $news_item;
        }
    }
    
    /**
     * Returns an array of news items
     * 
     * @return array List News
     */
    public static function GetNewsList()
    {
        $db = Db::GetConnection();
        
        $news_list = [];
        
        $result = $db->query('SELECT * FROM news ORDER BY date DESC LIMIT 10;');
        
        $i = 0;
        while ($row = $result->fetch())
        {
            $news_list[$i]['id'] = $row['id'];
            $news_list[$i]['title'] = $row['title'];
            $news_list[$i]['date'] = $row['date'];
            $news_list[$i]['short_content'] = $row['short_content'];
            $i++;
        }
        
        return $news_list;
    }
}
