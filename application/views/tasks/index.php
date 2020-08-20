<ul class="nav justify-content-center">
    <li class="nav-item">
        <a class="nav-link" href="/admin/login">Войти в админку</a>
    </li>
</ul>

<?php if ($flags & \application\controllers\TasksController::SUCCESS_ADD) : ?>
<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Успех!</h4>
  <p>Задача успешно добавлена в базу данных.</p>
</div>
<?php endif; ?>

<div class="container">
    <h2>Добавить задачу</h2>
    <form action="/" method="post">
        <div class="form-group">
            <p>Ваше имя:</p>
            <p><input class="form-control" type="text" name="name" maxlength="32"></p>
            
            <?php if ($flags & \application\controllers\TasksController::ERROR_NO_NAME) : ?>
                <small class="form-text text-danger">Введите <strong>Имя</strong>.</small><br>
            <?php endif; ?>
            
            <p>Ваш e-mail:</p>
            <p><input class="form-control" type="email" name="email" maxlength="64"></p>
            
            <?php if ($flags & \application\controllers\TasksController::ERROR_NO_EMAIL) : ?>
                <small class="form-text text-danger">Введите <strong>E-Mail</strong>.</small><br>
            <?php endif; ?>
            
            <?php if ($flags & \application\controllers\TasksController::ERROR_NO_VALIDE_EMAIL) : ?>
                <small class="form-text text-danger"><strong>E-Mail</strong> не валиден.</small><br>
            <?php endif; ?>
                
            <p>Текст задачи:</p>
            <p><textarea class="form-control" name="text" maxlength="1024"></textarea></p>
            
            <?php if ($flags & \application\controllers\TasksController::ERROR_NO_TEXT) : ?>
                <small class="form-text text-danger">Введите <strong>Текст</strong>.</small><br>
            <?php endif; ?>
                
            <button class="btn btn-primary" type="submit">Добавить задачу</button>
        </div>
    </form>

    <br>
    <h2>Список задач</h2>

<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Сортировка задач
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="<?php echo '/' . $page . '/0' ; ?>">По имени пользователя</a>
    <a class="dropdown-item" href="<?php echo '/' . $page . '/1' ; ?>">По e-mail</a>
    <a class="dropdown-item" href="<?php echo '/' . $page . '/2' ; ?>">По статусу выполнения</a>
  </div>
</div>
<br>
    
    <?php if ($count_pages == 0) : ?>
    <p class="text-info"><strong>Задач не найдено</strong></p>
    <?php endif; ?>
    
    <?php foreach($tasks as $task) : ?>
        <h4>Задача # <strong><?php echo $task['id'] . ' '; ?><span class="badge badge-secondary"><?php echo $task['done'] ? 'Выполнена' : 'Не выполнена'; ?></span></strong></h4>
        <p>Создатель: <strong><?php echo $task['name']; ?></strong></p>
        <p>E-Mail: <strong><?php echo $task['email']; ?></strong></p>
        <p>Текст: <strong><?php echo $task['text']; ?></strong></p>
        <hr>
    <?php endforeach; ?>
        
    <nav aria-label="Page navigation example">
        <ul class="pagination">
          <?php for ($i = 1; $i <= $count_pages; $i++) : ?>
            <li class="page-item"><a class="page-link" href="<?php echo '/' . $i . '/' . $sort; ?>"><?php echo $i; ?></a></li>
          <?php endfor; ?>
        </ul>
      </nav>
</div>