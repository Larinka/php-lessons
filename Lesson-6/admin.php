<!doctype html>
<html lang="en">
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
            <form action="upload.php" method="post" class="form-inline center" id="uploadJson" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="testJson">Выберите файл для загрузки:</label>
                    <div class="input-container">Выберите файл<input type="file" name="testJson" id="testJson"></div>
                    <p class="tip">файл в формате json</p>
                    <button name="submit" class="btn btn-info upload" type="submit" value="submit">Загрузить</button>
                    <a href="list.php" type="button" class="btn btn-info ml upload">Список тестов</a>
                </div>
            </form>
        </div>
    </body>
</html>
