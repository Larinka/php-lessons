<?php
    include  'functions.php';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="main.css">
    <title>Gallery</title>
</head>
<body>
  <div class="container">
    <div class="text-center">
      <?php
          $dir = 'img';
          $ext = 'jpg';
          $csvname = 'data.csv';
          $width = 265;
          $suffix = '_small';
          $files = getFiles($dir, $ext);
      ?>
      <?php if(!empty($files)): ?>
          <p class="upper">В папке <strong><?=$dir;?></strong> есть файлы в формате <strong><?=$ext;?></strong></p>
          <?php if ($info  = getFilesInfo($files)): ?>
              <p>Информация о файлах собрана успешно</p>
          <?php else: ?>
              <p>Не удалось собрать информацию о файлах</p>
          <?php endif ?>
          <?php if ($previews = createPreview(array_keys($info), $suffix, $width)): ?>
              <p>Миниатюры созданы</p>
              <?php $info = array_merge_recursive($info, $previews); ?>
          <?php else: ?>
              <p>Не удалось создать миниатюры</p>
          <?php endif ?>
          <?php if (exportToCsv($info, $csvname)): ?>
              <p>Информация о файлах экспортирована в CSV</p>
          <?php else: ?>
              <p>Не удалось экспортировать информацию о файлах в CSV</p>
          <?php endif ?>
          <p><a href="gallery.php" class="btn btn-info gallery" target="_blank">Перейти в галерею</a></p>
      <?php else: ?>
          <p class="upper">В папке <strong><?=$dir;?></strong> нет файлов в формате <strong><?=$ext;?></strong></p>
      <?php endif ?>
    </div>
  </div>
</body>
</html>
