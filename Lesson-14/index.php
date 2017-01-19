<?php
    session_start();
    require_once "autoloader.php";
    require_once "config.php";
    $db = new DB();
    $db->connectToDB();
    $authorization = new Authorization($db);
    $authorization->isLoggedIn();
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
              <h2>Привет, <?php echo $_SESSION['username'] ?></h2>
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
                      <a href="logout.php" type="button" class="btn btn-info">Выход</a>
                  </div>
              </form>

              <h3>Написанные тобой задачи:</h3>
              <?php $tasksCreatedByUser = $tasks->tasksCreatedByUser(); ?>
              <table class="table">
                  <tr>
                      <th>Дата добавления</th><th>Описание задачи</th><th>Статус</th><th>Исполнитель</th><th>Действия</th>
                  </tr>
                  <?php foreach ($tasksCreatedByUser as $task): ?>
                  <tr>
                      <td>
                          <?php if (isset($_POST['change']) && $_POST['change'] == $task['id'] . 't1'): ?>
                          <form method="post">
                              <input type="text" class="form-control" name="new_date_added" value="<?php echo $task['date_added']?>">
                          <?php else: echo $task['date_added'];
                          endif; ?>
                      </td>
                      <td>
                          <?php if (isset($_POST['change']) && $_POST['change'] == $task['id'] . 't1'): ?>
                              <input type="text" class="form-control" name="new_description" value="<?php echo $task['description']?>">
                          <?php else: echo $task['description'];
                          endif; ?>
                      </td>
                      <td>
                          <?php if (isset($_POST['change']) && $_POST['change'] == $task['id'] . 't1'): ?>
                              <select name="new_is_done" class="form-control">
                                  <option value="0">Не выполнено</option>
                                  <option value="1">В процессе</option>
                                  <option value="2">Выполнено</option>
                              </select>
                          <?php else: echo $task['is_done'];
                          endif; ?>
                      </td>
                      <td>
                          <?php if (isset($_POST['change']) && $_POST['change'] == $task['id'] . 't1'):
                          $users = $tasks->getAllUsers(); ?>
                              <select name="new_responsible" class="form-control">
                                  <?php foreach ($users as $user):?>
                                  <option value="<?php echo $user['user_id'] ?>"><?php echo $user['username'] ?></option>
                                  <?php endforeach; ?>
                              </select>
                          <?php elseif($task['responsible'] == $_SESSION['username']) : echo $_SESSION['username'] . ' (Я)'; else : echo $task['responsible']; endif; ?>
                      </td>
                      <td>
                        <?php if (isset($_POST['change']) && $_POST['change'] == $task['id'] . 't1'): ?>
                            <button type="submit" class="btn btn-info" name="change_id" value="<?php echo $task['id']?>">Сохранить</button>
                            <button type="submit" class="btn btn-info" name="change_id" value="">Отмена</button>
                        </form>
                      <?php else: ?>
                          <form method="post">
                              <?php if ($task['is_done'] !== 'Выполнено') : ?>
                              <button type="submit" class="btn btn-success btn-action" value="<?php echo $task['id'] . 't1'?>" name="mark_as_done">Выполнить</button>
                              <?php endif; ?>
                              <button type="submit" class="btn btn-warning btn-action" value="<?php echo $task['id'] . 't1'?>" name="change">Изменить</button>
                              <button type="submit" class="btn btn-danger btn-action" value="<?php echo $task['id'] . 't1'?>" name="delete">Удалить</button>
                          </form>
                          <?php endif; ?>
                      </td>
                  </tr>
                  <?php endforeach; ?>
              </table>

              <h3>Задачи, которые тебе нужно выполнить:</h3>
              <?php if(isset($_SESSION['error'])):?>
                  <h4 class="error"><?php echo $_SESSION['error'] ?></h4>
              <?php endif; ?>
              <?php $tasksWhereUserAssigned = $tasks->tasksWhereUserAssigned(); ?>
              <table class="table">
                  <tr>
                      <th>Дата добавления</th><th>Описание задачи</th><th>Статус</th><th>Автор</th><th>Действия</th>
                  </tr>
                  <?php foreach ($tasksWhereUserAssigned as $task): ?>
                  <tr>
                      <td>
                          <?php if (isset($_POST['change']) && $_POST['change'] == $task['id'] . 't2'): ?>
                          <form method="post">
                              <input type="text" class="form-control" name="new_date_added" value="<?php echo $task['date_added']?>">
                          <?php else: echo $task['date_added'];
                          endif; ?>
                      </td>
                      <td>
                          <?php if (isset($_POST['change']) && $_POST['change'] == $task['id'] . 't2'): ?>
                              <input type="text" class="form-control" name="new_description" value="<?php echo $task['description']?>">
                          <?php else: echo $task['description'];
                          endif; ?>
                      </td>
                      <td>
                          <?php if (isset($_POST['change']) && $_POST['change'] == $task['id'] . 't2'): ?>
                              <select name="new_is_done" class="form-control">
                                  <option value="0">Не выполнено</option>
                                  <option value="1">В процессе</option>
                                  <option value="2">Выполнено</option>
                              </select>
                          <?php else: echo $task['is_done'];
                          endif; ?>
                      </td>
                      <td>
                          <?php if ($task['author'] == $_SESSION['username']) : echo $_SESSION['username'] . ' (Я)'; else : echo $task['author']; endif;  ?>
                      </td>
                      <td>
                        <?php if (isset($_POST['change']) && $_POST['change'] == $task['id'] . 't2'): ?>
                            <button type="submit" class="btn btn-info" name="change_id" value="<?php echo $task['id']?>">Сохранить</button>
                            <button type="submit" class="btn btn-info" name="change_id" value="">Отмена</button>
                        </form>
                      <?php else: ?>
                          <form method="post">
                              <?php if ($task['is_done'] !== 'Выполнено') : ?>
                              <button type="submit" class="btn btn-success btn-action" value="<?php echo $task['id'] . 't2'?>" name="mark_as_done">Выполнить</button>
                              <?php endif; ?>
                              <button type="submit" class="btn btn-warning btn-action" value="<?php echo $task['id'] . 't2'?>" name="change">Изменить</button>
                              <button type="submit" class="btn btn-danger btn-action" value="<?php echo $task['id'] . 't2'?>" name="delete">Удалить</button>
                          </form>
                          <?php endif; ?>
                      </td>
                  </tr>
                  <?php endforeach; ?>
              </table>
        </div>
    </body>
</html>
