<?php
include 'functions.php';
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
                <h3>Доступные тесты</h3>
                <ul class="tests_list">
                    <?php
                        $uploadDir = "uploads/";
                        $tests = showUploadedTests($uploadDir);
                        foreach ($tests as $i => $test) :
                    ?>
                        <li><?=$i?></li>
                        <?php endforeach;?>
                </ul>

                <form method="get" class="form-inline">
                    <div class="form-group">
                        <label for="testNumber">Введите номер теста</label>
                        <input id="testNumber" class="form-control" placeholder="Номер теста" name="testNumber" />
                        <button type="submit" class="btn btn-info">Выбрать</button>
                    </div>
                </form>
                <br>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <?php if (!empty($_GET["testNumber"])) : ?>
                        <h3 class="center">Тест</h3>
                        <?php if (array_key_exists($_GET["testNumber"], $tests)) :
                            $jsonFilePath = $uploadDir . $tests[$_GET["testNumber"]];
                            $jsonContent = file_get_contents($jsonFilePath);
                            $jsonDecoded = json_decode($jsonContent, true);
                            showTest ($jsonDecoded);
                        ?>

                        <?php else : ?>
                            <p class="error center">Извините, тест не найден</p>;
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="center">
                <a href="admin.php">Перейти к загрузке файлов</a><br>
                <a href="index.php">Выход</a>
            </div>
        </div>
    </body>
</html>
