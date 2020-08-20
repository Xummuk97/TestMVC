<div class="container">
    <form action="/admin/login" method="post">
        <div class="form-group">
            <p>Введите логин:</p>
            <p><input class="form-control" type="text" name="login" maxlength="32"></p>
            
            <?php if ($flags & application\controllers\AdminController::ERROR_NO_LOGIN) : ?>
                <small class="form-text text-danger">Введите <strong>Логин</strong>.</small><br>
            <?php endif; ?>
            
            <p>Введите пароль:</p>
            <p><input class="form-control" type="password" name="password" maxlength="32"></p>
            
            <?php if ($flags & application\controllers\AdminController::ERROR_NO_PASSWORD) : ?>
                <small class="form-text text-danger">Введите <strong>Пароль</strong>.</small><br>
            <?php endif; ?>
            
            <?php if ($flags & application\controllers\AdminController::ERROR_INCORRECT_DATA) : ?>
                <small class="form-text text-danger">Вы ввели неправильные данные.</small><br>
            <?php endif; ?>
                
            <button class="btn btn-primary" type="submit">Вход</button>
        </div>
    </form>
</div>