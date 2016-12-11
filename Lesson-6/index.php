<?php
include 'functions.php';
$name = getQueryParam('name');
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Генератор тестов на PHP и JSON</title>
  </head>
  <body>
    <header class="header">
      <h1>Генератор тестов на PHP и JSON</h1>
    </header>
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-md-offset-4 center">
          <form action="index.php" method="post" enctype="multipart/form-data">
            <?php if(isGET()): ?>
              <h3>Войдите в систему</h3>
              <div class="form-group left">
                <label for="guest-name">Имя</label>
                <input type="text" class="form-control" id="guest-name" name="guest-name" placeholder="Введите имя" required>
              </div>
              <button type="submit" class="btn btn-info enter">Войти</button>
            <?php else: ?>
              <p class="hello">Здравствуйте, <?= getQueryParam('guest-name') ?></p><br/>
              <ul class="list-inline">
                <li><a href="admin.php" type="button" class="btn btn-info">Загрузить тест</a></li>
                <li><a href="list.php" type="button" class="btn btn-info ml">Список тестов</a></li>
              </ul>
            <?php endif; ?>
          </form>
        </div
      </div>
    </div>
  </body>
</html>
