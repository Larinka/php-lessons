<?php
session_start();
require_once "autoloader.php";
require_once "config.php";
$db = new DB();
$db->connectToDB();
$authorization = new Authorization($db);
$authorization->checkLogin();
?>

<!doctype html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
        <title>Задачи</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <h3>Войти</h3>
                    <?php if(isset($_SESSION['error_login'])):?>
                        <h4><?php echo $_SESSION['error_login'] ?></h4>
                    <?php endif; ?>
                    <form method="post">
                        <div class="form-group">
                            <label for="username">Имя</label>
                            <input type="text" class="form-control" name="username">
                        </div>
                        <div class="form-group">
                            <label for="password">Пароль</label>
                            <input type="password" class="form-control" name="password" type="password">
                        </div>
                        <button type="submit" class="btn btn-info">Войти</button>
                    </form>
                    <p>До сих пор нет аккаунта? <a href="registration.php">Регистрация</a></p>
                </div>
            </div>
        </div>
    </body>
</html>
