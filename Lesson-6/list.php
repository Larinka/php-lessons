<?php
    include  'functions.php';
    $tests = showTests();
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
      <table class="table table-bordered table-condensed text-center">
      <tr class="nb"><th class="nb"></th><th class="nb center">Список вопросов</th><th class="nb"></th></tr>
      <?php foreach ($tests as $test) : ?>
          <?php $test['id'] = intval($test['id']);?>
          <?php $test['question']  = trim(xssafe($test['question']));?>
          <tr>
            <td><?=$test['id']?></td><td><?=$test['question']?></td>
            <td><a href="test.php?id=<?=$test['id']?>" class="btn btn-info">открыть тест</a></td>
          </tr>
      <?php endforeach; ?>
      </table>
    </div>
  </body>
</html>
