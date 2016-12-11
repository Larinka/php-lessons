<?php
  include 'functions.php';
  $id = (!empty($_GET['id'])) ? intval($_GET['id']) : null;
  if (isset($_GET['id'])) {
      $id = intval($_GET['id']);
      $test = getTest($id);
  }

  function getTest($id) {
     $file = __DIR__ . '/tests/test_*.json';
     if (is_readable($file)) {
         $data = json_decode(file_get_contents($file), true);
         foreach ($data as $test) {
             if ($test['id'] == $id) {
                 return $test;
             }
         }
     }
     return [];
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
    <div class="center">
      <h2>Ответьте на вопрос</h2>
      <form action="test.php?id=<?= $id ?>" method="post">
        <div class="form-group">
            <label for="answer" class="test-question"><?= $test['question'] ?></label>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <input class="form-control" type="text" id="answer" name="answer" required placeholder="Введите ответ...">
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-info">проверить</button>
            <a href="list.php" type="button" class="btn btn-info ml">Список тестов</a>
            <?php if (isset($_POST['answer'])) : ?>
              <?php if ($answer === $test['answer']) : ?>
                <p>Ваш ответ <?= $answer ?> правильный.<br>
                <a href="list.php">другой вопрос</a></p>
              <?php else: ?>
                <p>Ваш ответ <?= $answer ?> неверный</p>
              <?php endif; ?>
            <?php endif; ?>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
