<!DOCTYPE html>
<html>
    <head>
        <title>Заголовок</title>
        <link href="/application/templates/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    </head>
    
    <body>
        <div class="container">
            <?php foreach ($news_list as $news): ?>
            <div class="news">
                <h4><?php echo $news['title']; ?></h4>
                <p><?php echo $news['short_content']; ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </body>
</html>