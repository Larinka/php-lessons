<?php

  class WebNews {
      public $date;
      public $title;
      public $text;
      public $image;

      public function __construct($date, $title, $text)
      {
        $this->date = $date;
        $this->title = $title;
        $this->text = $text;
      }


      public function getDate()
      {
          return $this->date;
      }

      public function getTitle()
      {
          return $this->title;
      }

      public function setImage($image)
      {
          $this->image = $image;
      }

      public function getImage()
      {
          return $this->image;
      }

      public function getText()
      {
          return $this->text;
      }
  }
  $news1 = new WebNews('20/12/16', 'В Дубае вывели универсальную формулу счастья для всех', 'Дубай, ОАЭ. Специалисты управления свободной зоны «Силиконовый оазис Дубая» вывели универсальную формулу счастья, которая выглядит как «Счастье = Реальность – Ожидания».  По мнению департамента счастья управления, для измерения уровня счастья важны не только материальные понятия, но и также эмоции, чувства и состояние сознания – все это влияет на продуктивность работы и качество жизни человека.');
  $news1->setImage('<img class="img-responsive" src="img/1.jpg" alt="">');

  $news2 = new WebNews('20/12/16', 'Samsung принудительно отключат Galaxy Note 7 в России', 'Во избежание продолжения истории с возгорающимися гаджетами, компания Samsung Electronics приняла решение вслед за полным отзывом Galaxy Note 7 принудительно отключить оставшиеся «на руках» смартфоны данной модели. Уже в ближайшее время данная участь постигнет и девайсы, использующиеся в России.');
  $news2->setImage('<img class="img-responsive" src="img/2.jpg" alt="">');

  $news3 = new WebNews('20/12/16', 'Полное управление: новый Lamborghini Aventador S', 'В оснащение Aventador S входит система выбора режимов движения с настройками Strada, Sport, Corsa и новой Ego под конкретного водителя, воздействующими на силовой агрегат, трансмиссию, рулевое управление и подвеску, а также углерод-керамические тормозные диски.');
  $news3->setImage('<img class="img-responsive" src="img/3.jpg" alt="">');

  $news4 = new WebNews('19/12/16', 'Роман Широков заявил о готовности возобновить карьеру', 'Футбольный агент Арсен Минасов, представляющий интересы экс-капитана сборной России Романа Широкова заявил о готовности спортсмена вернуться в профессиональный футбол, если ему поступит достойное предложение.');
  $news4->setImage('<img class="img-responsive" src="img/4.jpg" alt="">');

  $news5 = new WebNews('19/12/16', 'Журнал Interview прекращает работу в России', 'Российская версия популярного американского журнала Interview прекращает свое существование как в печатном, так и в электронном виде. Об этом ТАСС сообщили в пресс-службе издания. Соответствующее решение принято в связи с окончанием лицензии, а также сложной экономической ситуацией в стране.');
  $news5->setImage('<img class="img-responsive" src="img/5.jpg" alt="">');

  $news6 = new WebNews('18/12/16', 'ФАС отложила рассмотрение дела против Microsoft', 'Федеральная антимонопольная служба (ФАС) России перенесла рассмотрение дела против корпорации Microsoft о злоупотреблении доминирующим положением на рынке предварительно на конец января.');
  $news6->setImage('<img class="img-responsive" src="img/6.jpg" alt="">');
?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="main.css">
        <title>Новости</title>
    </head>
    <body>
        <header>
            <nav class="navbar">
                <ul class="nav navbar-default">
                    <li><a href="index.php">Теория</a></li>
                    <li><a href="news.php">Новости</a></li>
                </ul>
            </nav>
        </header>
        <div class="container">
            <h1>Новости</h1>
            <div class="row">
                <div class="col-md-4">
                    <p class="date"><?php echo $news1->getDate(); ?></p>
                    <p class="title"><?php echo $news1->getTitle(); ?></p>
                    <figure><?php echo $news1->getImage(); ?></figure>
                    <p class="text"><?php echo $news1->getText(); ?></p>
                </div>
                <div class="col-md-4">
                    <p class="date"><?php echo $news2->getDate(); ?></p>
                    <p class="title"><?php echo $news2->getTitle(); ?></p>
                    <figure><?php echo $news2->getImage(); ?></figure>
                    <p class="text"><?php echo $news2->getText(); ?></p>
                </div>
                <div class="col-md-4">
                    <p class="date"><?php echo $news3->getDate(); ?></p>
                    <p class="title"><?php echo $news3->getTitle(); ?></p>
                    <figure><?php echo $news3->getImage(); ?></figure>
                    <p class="text"><?php echo $news3->getText(); ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p class="date"><?php echo $news1->getDate(); ?></p>
                    <p class="title"><?php echo $news1->getTitle(); ?></p>
                    <figure><?php echo $news4->getImage(); ?></figure>
                    <p class="text"><?php echo $news1->getText(); ?></p>
                </div>
                <div class="col-md-4">
                    <p class="date"><?php echo $news2->getDate(); ?></p>
                    <p class="title"><?php echo $news2->getTitle(); ?></p>
                    <figure><?php echo $news5->getImage(); ?></figure>
                    <p class="text"><?php echo $news2->getText(); ?></p>
                </div>
                <div class="col-md-4">
                    <p class="date"><?php echo $news3->getDate(); ?></p>
                    <p class="title"><?php echo $news3->getTitle(); ?></p>
                    <figure><?php echo $news6->getImage(); ?></figure>
                    <p class="text"><?php echo $news3->getText(); ?></p>
                </div>
            </div>
        </div>
        <footer class="footer"><small>Vl &#169;</small></footer>
    </body>
</html>
