<?php
require_once 'autoload.php';

$candie1 = new Candies('Конфеты Мишки на севере', 200);
$candie1->setWeight(6);
$candie2 = new Candies('Конфеты Ирис Кис-Кис', 290);
$candie2->setWeight(12);
$tangerine1 = new Tangerines('Мандарины импортные', 300);
$tangerine1->setWeight(3);
$tangerine2 = new Tangerines('Мандарины российские', 100);
$tangerine2->setWeight(15);
$cookie1 = new Cookies('Печенье Юбилейное', 120);
$cookie1->setWeight(8);
$cookie2 = new Cookies('Печенье Барни', 320);
$cookie2->setWeight(2);

?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="main.css">
        <title>Дополнительное задание</title>
    </head>
    <body>
        <header>
            <nav class="navbar">
                  <ul class="nav navbar-default">
                      <li><a href="index.php">Теория</a></li>
                      <li><a href="products.php">Товары (доп. задание)</a></li>
                  </ul>
            </nav>
        </header>
        <div class="container">
            <h1>Товары</h1>
            <table class="table">
                <tr>
                    <th>Товар</th><th>Вес</th><th>Цена товара</th><th>Цена доставки</th>
                </tr>
                <tr>
                    <td><?php echo $candie1->name ?></td>
                    <td><?php echo $candie1->getWeight(); ?> кг</td>
                    <td><?php echo $candie1->getPrice(); ?> руб</td>
                    <td><?php echo $candie1->getDeliveryPrice(); ?> руб</td>
                </tr>
                <tr>
                    <td><?php echo $candie2->name ?></td>
                    <td><?php echo $candie2->getWeight(); ?> кг</td>
                    <td><?php echo $candie2->getPrice(); ?> руб</td>
                    <td><?php echo $candie2->getDeliveryPrice(); ?> руб</td>
                </tr>
                <tr>
                    <td><?php echo $tangerine1->name ?></td>
                    <td><?php echo $tangerine1->getWeight(); ?> кг</td>
                    <td><?php echo $tangerine1->getPrice(); ?> руб</td>
                    <td><?php echo $tangerine1->getDeliveryPrice(); ?> руб</td>
                </tr>
                <tr>
                    <td><?php echo $tangerine2->name ?></td>
                    <td><?php echo $tangerine2->getWeight(); ?> кг</td>
                    <td><?php echo $tangerine2->getPrice(); ?> руб</td>
                    <td><?php echo $tangerine2->getDeliveryPrice(); ?> руб</td>
                </tr>
                <tr>
                    <td><?php echo $cookie1->name ?></td>
                    <td><?php echo $cookie1->getWeight(); ?> кг</td>
                    <td><?php echo $cookie1->getPrice(); ?> руб</td>
                    <td><?php echo $cookie1->getDeliveryPrice(); ?> руб</td>
                </tr>
                <tr>
                    <td><?php echo $cookie2->name ?></td>
                    <td><?php echo $cookie2->getWeight(); ?> кг</td>
                    <td><?php echo $cookie2->getPrice(); ?> руб</td>
                    <td><?php echo $cookie2->getDeliveryPrice(); ?> руб</td>
                </tr>
            </table>
        </div>
        <div class="rasporka"></div>
        <footer class="footer"><small>Vl &#169;</small></footer>
    </body>
</html>
