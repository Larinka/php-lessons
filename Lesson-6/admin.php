<?php
    include 'functions.php';
    if (isPOST()) {
        if (!isAllowedExt(getUploadedFileClientName())) {
            echo '<p style="text-align: center;">Разрешено загружать только файлы в формате json.<br><a href="admin.php">Назад</a></p>';
            die;
        }
        if(!uploadFile('test', getUploadedFileNewName())) {
            echo '<p style="text-align: center;">Файл не смог загрузиться.<br><a href="admin.php">Назад</a></p>';
            die;
        }
    }
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
      <?php if(isGET()): ?>
      <form class="center" method="post" enctype="multipart/form-data">
          <div class="form-group">
              <label for="test">Загрузите тест</label>
              <div class="input-container">Выберите файл<input type="file" id="test" name="test"></div>
              <p class="tip">файл в формате json</p>
          </div>
          <button type="submit" class="btn btn-info">Загрузить тест</button>
          <a href="list.php" type="button" class="btn btn-info ml">Список тестов</a>
        <?php else: ?>
          <div class="center">
            <p>Файл загружен</p>
            <a href="list.php" type="button" class="btn btn-info">Список тестов</a>
          </div>
        <?php endif; ?>
      </form>
    </div>
  </body>
</html>
