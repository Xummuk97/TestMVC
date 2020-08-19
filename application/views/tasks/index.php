<ul class="nav justify-content-center">
    <li class="nav-item">
        <?php if (!$IS_ADMIN) : ?>
            <a class="nav-link" href="/admin">Войти в админку</a>
        <?php else : ?>
            <a class="nav-link" href="/admin/logout">Выйти из админки</a>
        <?php endif; ?>
    </li>
</ul>

<div class="container">
    <h2>Добавить задачу</h2>
    <form action="/tasks/add" method="post">
        <div class="form-group">
            <p>Ваше имя:</p>
            <p><input class="form-control" type="text" name="name" maxlength="32"></p>
            <p>Ваш e-mail:</p>
            <p><input class="form-control" type="email" name="email" maxlength="32"></p>
            <p>Текст задачи:</p>
            <p><textarea class="form-control" name="text" maxlength="1024"></textarea></p>
            <button class="btn btn-primary" type="submit">Добавить задачу</button>
        </div>
    </form>
    
    <br>
    <h2>Список задач</h2>
    
    <?php foreach($tasks as $task) : ?>
        <h4>Задача # <strong><?php echo $task['id']; ?></strong></h4>
        <p>Создатель: <strong><?php echo $task['name']; ?></strong></p>
        <p>E-Mail: <strong><?php echo $task['email']; ?></strong></p>
        <p>Текст: <strong><?php echo $task['text']; ?></strong></p>
        <hr>
    <?php endforeach; ?>
        
    <nav aria-label="Page navigation example">
        <ul class="pagination">
          <?php for ($i = 1; $i <= $str_pag; $i++) : ?>
            <li class="page-item"><a class="page-link" href="<?php echo $i; ?>"><?php echo $i; ?></a></li>
          <?php endfor; ?>
        </ul>
      </nav>
</div>