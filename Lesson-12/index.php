<?php
require_once "config.php";
require_once "autoload.php";
$db = new DB();
$db->connectToDB();
?>
    <!doctype html>
    <html lang="ru">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="main.css">
        <title>Библиотека</title>
    </head>
    <body>
        <div class="container">
            <?php $books = new Books(); ?>
            <h1>Список книг</h1>
            <form method="post" class="form-inline">
                <div class="form-group">
                    <label for="isbn">ISBN:</label>
                    <input name="isbn" id="isbn" class="form-control" value="<?php echo $books->userSearch('isbn'); ?>">
                </div>
                <div class="form-group">
                    <label for="name">Название:</label>
                    <input name="name" id="name" class="form-control" value="<?php echo $books->userSearch('name'); ?>">
                </div>
                <div class="form-group">
                    <label for="author">Автор:</label>
                    <input name="author" id="author" class="form-control" value="<?php echo $books->userSearch('author'); ?>">
                </div>
                <button type="submit" class="btn btn-info">Найти</button>
            </form>
            <br>
            <?php $books->getBooksTable($db); ?>
        </div>
    </body>
    </html>
