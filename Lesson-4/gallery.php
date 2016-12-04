<?php
error_reporting(E_ALL);

//import from csv
function getFilesInfo($relPath) {
    if (!is_readable($relPath)) {
        return false;
    }
    $info = [];
    $fd = fopen($relPath, 'r');
    while (($data = fgetcsv($fd, 1000, ',')) !== FALSE) {
        $info[$data[0]]['size']    = $data[1];
        $info[$data[0]]['mtime']   = $data[2];
        $info[$data[0]]['preview'] = $data[3];
    }
    fclose($fd);
    return $info;
}

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
    <?php $fileName = 'data.csv'; ?>
    <?php if (($info = getFilesInfo($fileName)) === FALSE): ?>
        <p>Нет информации об изображениях.</p>
    <?php endif ?>
    <h1>Gallery</h1>
    <div class="row">
      <?php foreach ($info as $fname => $image): ?>
        <?php $mtime = date('Y-m-d H:m:s', $image['mtime']); ?>
        <div class="col-md-3">
          <div class="thumbnail"><img src="<?=$image['preview'];?>"/>
            <div class="caption">
              <p><strong>Размер: </strong><?=$image['size'];?></p>
              <p><strong>Время: </strong><?=$mtime;?></p>
              <a href="<?=$fname;?>" class="btn btn-info" title="Открыть в новом окне" target="_blank">Открыть</a></div></div></div>
      <?php endforeach; ?>
    </div>
  </div>
</body>
</html>
