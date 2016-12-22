<!DOCTYPE html>
<html lang="ru">
  <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
      <link rel="stylesheet" href="main.css">
      <title>Занятие 3.1. Классы и объекты</title>
  </head>
  <body>
      <header>
          <nav class="navbar">
                <ul class="nav navbar-default">
                    <li><a href="index.php">Теория</a></li>
                    <li><a href="News_v1.php">Новости</a></li>
                </ul>
          </nav>
      </header>
      <div class="container">
          <h1>Классы и объекты</h1>
          <div class="row">
              <div class="col-md-6">
                  <h2>Инкапсуляция своими словами</h2>
                  <figure>
                      <img class="img-responsive" src="img/t1.jpg" alt="">
                      <figcaption class="text">Я больше понимаю понятие <strong class="line">инкапсуляции</strong> в психологии и медицине. Думаю, здесь что-то по аналогии.
                      От латинского оно означает "Заключение в ящик, коробку". То есть мы берем какие-то нужные нам объекты и
                      как бы запаковываем их в этот самый "ящик" под названием Класс. И при необходимости нам уже не нужно
                      перечислять все эти объекты и свойства снова, мы просто можем поставить на это место наш "ящик" Класс,
                      из которого достаем нужные нам объекты в бесконечном количестве с нужными свойствами, тем самым
                      сократив количество кода и сделав его понятнее. То есть вместо переписывания одинакового куска кода мы
                      делаем некий шаблон и просто подставляем в него нужные нам значения.</figcaption>
                  </figure>
              </div>
              <div class="col-md-6">
                  <h2>Плюсы и минусы объектов</h2>
                  <figure>
                      <img class="img-responsive" src="img/t2.jpg" alt="">
                      <figcaption class="text"><strong class="line">Плюсы</strong> В объекте мы записываем все необходимые свойства и методы, с которыми потом гораздо легче
                      работать. То есть если у нас есть объект user, мы можем хранить в нем всю информацию о пользователях
                      (имена, фамилии, адреса, пароли и прочее) и также методы авторизации и т.д. Такой код гораздо легче для
                      понимания и в нем легче искать ошибку, если что-то не работает.<br><br><strong class="line">Минусы</strong> Минусов не придумала. Наверное,
                      минусом является неумелое использование классов и объектов. Писать их везде, даже для простейших задач,
                      нецелесообразно.</figcaption>
                  </figure>
              </div>
          </div>
      </div>
      <footer class="footer"><small>Vl &#169;</small></footer>
  </body>
</html>
