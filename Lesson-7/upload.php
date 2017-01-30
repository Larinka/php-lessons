<?php
    include 'functions.php';

    $uploadDir = "uploads/";

    if (!file_exists($uploadDir) || (file_exists($uploadDir) && !is_dir($uploadDir))) {
        mkdir($uploadDir);
    }

    $temp = explode('.', $_FILES['testJson']['name']);

    $timeStampExploded = explode('.', microtime(true));
    $timeStampImploded = implode ($timeStampExploded);
    $newFileName = $timeStampImploded . '.' . end($temp);

    $uploadFile = $uploadDir . $newFileName;



?>

<!doctype html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
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
                <?php if (isPOST()) : ?>
                    <?php if (!isAllowedExt(getUploadedFileClientName())) : ?>
                        <p>Разрешено загружать только файлы в формате json.<br><a href="admin.php">Назад</a></p>
                        <?php die; ?>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if (move_uploaded_file($_FILES['testJson']['tmp_name'], $uploadFile)) : ?>
                    <p>Файл успешно загружен! Перейти к <a href="list.php">списку тестов</a>.</p>
                <?php else: ?>
                    <p class="error">Не удалось загрузить файл</p>
                <?php endif; ?>
            </div>
        </div>
    </body>
</html>
