<ul class="nav justify-content-center">
    <li class="nav-item">
        <a class="nav-link" href="/">Выход</a>
    </li>
</ul>

<div class="container">
    <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Имя</th>
        <th scope="col">E-Mail</th>
        <th scope="col">Текст</th>
        <th scope="col">Выполнено</th>
        <th scope="col">Редактирован админом</th>
        <th scope="col">Действие</th>
      </tr>
    </thead>
    <tbody>
        <?php foreach ($tasks as $task) : ?>
        <tr>
            <th scope="row"><?php echo $task['id']; ?></th>
            <td><?php echo $task['name']; ?></td>
            <td><?php echo $task['email']; ?></td>
            <td><?php echo $task['text']; ?></td>
            <td><?php echo $task['done'] ? 'Да' : 'Нет'; ?></td>
            <td><?php echo $task['edit'] ? 'Да' : 'Нет'; ?></td>
            <td>
                <form action="/admin" method="post">
                    <input type="hidden" name="task_id" value="<?php echo $task['id']; ?>">
                    <select name="actions" class="form-control">
                        <option>Нет действия</option>
                        <option>Редактировать</option>
                        <option>Удалить</option>
                    </select>
                    <button type="submit" class="btn btn-primary">Выполнить</button>
                </form>
            </td>
          </tr>
        <?php endforeach; ?>
    </tbody>
  </table>
</div>