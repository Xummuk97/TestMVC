<ul class="nav justify-content-center">
    <li class="nav-item">
        <a class="nav-link" href="/admin">Назад</a>
        <a class="nav-link" href="/">Выход</a>
    </li>
</ul>

<div class="container">
    <form action="/admin/edit/<?php echo $task['id']; ?>" method="post">
        <p>ID:</p>
        <p><input class="form-control" type="text" name="id" value="<?php echo $task['id']; ?>" readonly></p>
        
        <p>Имя:</p>
        <p><input class="form-control" type="text" name="name" maxlength="32" value="<?php echo $task['name']; ?>"></p>
        
        <?php if ($flags & \application\controllers\TasksController::ERROR_NO_NAME) : ?>
            <small class="form-text text-danger">Введите <strong>Имя</strong>.</small><br>
        <?php endif; ?>
                
        <p>E-Mail:</p>
        <p><input class="form-control" type="text" name="email" maxlength="64" value="<?php echo $task['email']; ?>"></p>
        
        <?php if ($flags & \application\controllers\TasksController::ERROR_NO_EMAIL) : ?>
                <small class="form-text text-danger">Введите <strong>E-Mail</strong>.</small><br>
            <?php endif; ?>
            
            <?php if ($flags & \application\controllers\TasksController::ERROR_NO_VALIDE_EMAIL) : ?>
                <small class="form-text text-danger"><strong>E-Mail</strong> не валиден.</small><br>
            <?php endif; ?>
                
        <p>Текст:</p>
        <p><textarea class="form-control" name="text" maxlength="1024"><?php echo $task['text']; ?></textarea></p>
        
        <?php if ($flags & \application\controllers\TasksController::ERROR_NO_TEXT) : ?>
                <small class="form-text text-danger">Введите <strong>Текст</strong>.</small><br>
            <?php endif; ?>
                
        <p>Выполнен:</p>
        <p><input class="form-control" type="text" name="done" value="<?php echo $task['done']; ?>"></p>
        
        <?php if ($flags & \application\controllers\TasksController::ERROR_NO_DONE) : ?>
                <small class="form-text text-danger">Введите <strong>Выполнен (1) или нет (0)</strong>.</small><br>
            <?php endif; ?>
        
        <button class="btn btn-primary" type="submit">Редактировать</button>
    </form>
</div>