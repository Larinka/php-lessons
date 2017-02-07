<?php
    session_start();
    require_once "autoloader.php";
    require_once "config.php";
    $db = new Db();
    $db->connectToDb();
    $selectTable = isset($_POST['select_table']) ? $_POST['select_table'] : false;
?>

<!doctype html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
        <title>Базы данных</title>
    </head>
    <body>
        <div class="container">
              <h1>Таблицы в базе данных</h1>

              <form method="post" class="form-inline">
                  <label for="select_table">Выбрать таблицу</label>
                  <select name="select_table" class="form-control">
                      <?php $tables = $db->getAllTablesNames(); foreach ($tables as $table) : foreach ($table as $name) : ?>
                      <option value="<?php echo $name ?>"><?php echo $name ?></option>
                      <?php endforeach; endforeach; ?>
                  </select>
                  <button type="submit" class="btn btn-info" name="save">Выбрать</button>
              </form>

              <?php if ($selectTable == true) : ?>
                  <table class="table">
                      <tr>
                          <th>Поле</th><th>Тип</th><th>NULL</th><th>Ключ</th><th>Значение по умолчанию</th><th>Дополнительно</th>
                      </tr>
                      <tr>
                          <?php $tableInfo = $db->getTableInfo($selectTable);
                          foreach ($tableInfo as $field): ?>
                      <tr>
                          <?php foreach ($field as $detail): ?>
                              <td><?php echo $detail; ?></td>
                          <?php endforeach; ?>
                      </tr>
                          <?php endforeach; ?>
                  </table>
              <?php endif; ?>
        </div>
    </body>
</html>
