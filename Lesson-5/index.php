<?php
    include  'functions.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="main.css">
    <title>Телефонный справочник</title>
</head>
<body>
    <div class="container">
      <h1>Телефонный справочник</h1>
      <table class="table table-condensed table-bordered">
          <tr>
            <th>Имя</th><th>Фамилия</th><th>Город</th><th>Адрес</th><th>Телефон</th><th>E-mail</th>
          </tr>
          <?php foreach (getRecords() as $record): ?>
              <tr>
                  <td><?= $record['firstName'] ?></td>
                  <td><?= $record['lastName'] ?></td>
                  <td><?= $record['city'] ?></td>
                  <td><?= $record['address'] ?></td>
                  <td>
                      <?php if (is_array($record['phoneNumber'])): ?>
                          <?php foreach ($record['phoneNumber'] as $phone): ?>
                              <?= $phone ?><br>
                          <? endforeach; ?>
                      <? else: ?>
                          <?= $record['phoneNumber'] ?>
                      <? endif ?>
                  </td>
                  <td><?= $record['email'] ?></td>
              </tr>
          <? endforeach; ?>
      </table>
    </div>
</body>
</html>
