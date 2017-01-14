<?php
    require_once "config.php";
    require_once "autoloader.php";
    $db = new DB();
    $db->connectToDB();
    $tasks = new Tasks($db);
    $tasks->userAction();
?>

<!doctype html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
        <title>Задачи</title>
    </head>
    <body>
        <div class="container">
              <h1>Задачи</h1>
              <form method="POST" class="form-inline">
                  <div class="form-group">
                      <label for="new_task">Новая задача</label>
                      <input type="text" name="new_task" class="form-control" value=""/>
                      <button type="submit" class="btn btn-info" name="save">Добавить</button>
                  </div>
                  <div class="form-group">
                      <label for="sort" class="ml-20">Сортировать по</label>
                      <select name="sort_by" class="form-control">
                          <option value="date_added">Дате</option>
                          <option value="is_done">Статусу</option>
                          <option value="description">Описанию</option>
                      </select>
                      <button type="submit" class="btn btn-info" name="sort">Сортировать</button>
                  </div>
              </form>
              <?php $allTasks = $tasks->getAllTasks(); ?>
              <table class="table">
                  <tr>
                      <th>Дата добавления</th><th>Описание задачи</th><th>Статус</th><th>Действия</th>
                  </tr>
                  <?php foreach ($allTasks as $task): ?>
                  <tr>
                      <td>
                          <?php if (isset($_POST['change']) && $_POST['change'] == $task['id']): ?>
                          <form method="post">
                              <input type="text" class="form-control" name="new_date_added" value="<?php echo $task['date_added']?>">
                              <button type="submit" class="btn btn-info btn-change" name="change_id" value="<?php echo $task['id']?>">Сохранить</button>
                          <?php else: echo $task['date_added'];
                          endif; ?>
                      </td>
                      <td>
                          <?php if (isset($_POST['change']) && $_POST['change'] == $task['id']): ?>
                              <input type="text" class="form-control" name="new_description" value="<?php echo $task['description']?>">
                              <button type="submit" class="btn btn-info btn-change" name="change_id" value="<?php echo $task['id']?>">Сохранить</button>
                          <?php else: echo $task['description'];
                          endif; ?>
                      </td>
                      <td>
                          <?php if (isset($_POST['change']) && $_POST['change'] == $task['id']): ?>
                              <select name="new_is_done" class="form-control">
                                  <option value="0">Не выполнено</option>
                                  <option value="1">В процессе</option>
                                  <option value="2">Выполнено</option>
                              </select>
                              <button type="submit" class="btn btn-info btn-change" name="change_id" value="<?php echo $task['id']?>">Сохранить</button>
                          </form>
                          <?php else: echo $task['is_done'];
                          endif; ?></td>
                      <td>
                          <form method="post">
                              <?php if ($task['is_done'] !== 'Выполнено') : ?>
                              <button type="submit" class="btn btn-success btn-action" value="<?php echo $task['id']?>" name="mark_as_done">Выполнить</button>
                              <?php endif; ?>
                              <button type="submit" class="btn btn-warning btn-action" value="<?php echo $task['id']?>" name="change">Изменить</button>
                              <button type="submit" class="btn btn-danger btn-action" value="<?php echo $task['id']?>" name="delete">Удалить</button>
                          </form>
                      </td>
                  </tr>
                  <?php endforeach; ?>
              </table>
        </div>
    </body>
</html>
