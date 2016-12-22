<?php

    class WebNews {
        public $date;
        public $title;
        public $text;

        public function __construct($date, $title, $text) {
          $this->date = $date;
          $this->title = $title;
          $this->text = $text;
        }
    }
    $news1 = new WebNews('20/12/16', 'В Дубае вывели универсальную формулу счастья для всех', 'Дубай, ОАЭ. Специалисты управления свободной зоны «Силиконовый оазис Дубая» вывели универсальную формулу счастья, которая выглядит как «Счастье = Реальность – Ожидания».  По мнению департамента счастья управления, для измерения уровня счастья важны не только материальные понятия, но и также эмоции, чувства и состояние сознания – все это влияет на продуктивность работы и качество жизни человека.');
    $news2 = new WebNews('20/12/16', 'Samsung принудительно отключат Galaxy Note 7 в России', 'Во избежание продолжения истории с возгорающимися гаджетами, компания Samsung Electronics приняла решение вслед за полным отзывом Galaxy Note 7 принудительно отключить оставшиеся «на руках» смартфоны данной модели. Уже в ближайшее время данная участь постигнет и девайсы, использующиеся в России.');
    $news3 = new WebNews('20/12/16', 'Полное управление: новый Lamborghini Aventador S', 'В оснащение Aventador S входит система выбора режимов движения с настройками Strada, Sport, Corsa и новой Ego под конкретного водителя, воздействующими на силовой агрегат, трансмиссию, рулевое управление и подвеску, а также углерод-керамические тормозные диски.');
    $news4 = new WebNews('19/12/16', 'Роман Широков заявил о готовности возобновить карьеру', 'Футбольный агент Арсен Минасов, представляющий интересы экс-капитана сборной России Романа Широкова заявил о готовности спортсмена вернуться в профессиональный футбол, если ему поступит достойное предложение.');
    $news5 = new WebNews('19/12/16', 'Журнал Interview прекращает работу в России', 'Российская версия популярного американского журнала Interview прекращает свое существование как в печатном, так и в электронном виде. Об этом ТАСС сообщили в пресс-службе издания. Соответствующее решение принято в связи с окончанием лицензии, а также сложной экономической ситуацией в стране.');
    $news6 = new WebNews('18/12/16', 'ФАС отложила рассмотрение дела против Microsoft', 'Федеральная антимонопольная служба (ФАС) России перенесла рассмотрение дела против корпорации Microsoft о злоупотреблении доминирующим положением на рынке предварительно на конец января.');

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
        <div class="container">
            <h1>Новости</h1>
            <div class="row">
                <div class="col-md-4">
                    <p class="date"><?php echo $news1->date; ?></p>
                    <p class="title"><?php echo $news1->title; ?></p>
                    <figure><img class="img-responsive" src="img/1.jpg" alt=""></figure>
                    <p class="text"><?php echo $news1->text; ?></p>
                </div>
                <div class="col-md-4">
                    <p class="date"><?php echo $news2->date; ?></p>
                    <p class="title"><?php echo $news2->title; ?></p>
                    <figure><img class="img-responsive" src="img/2.jpg" alt=""></figure>
                    <p class="text"><?php echo $news2->text; ?></p>
                </div>
                <div class="col-md-4">
                    <p class="date"><?php echo $news3->date; ?></p>
                    <p class="title"><?php echo $news3->title; ?></p>
                    <figure><img class="img-responsive" src="img/3.jpg" alt=""></figure>
                    <p class="text"><?php echo $news3->text; ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p class="date"><?php echo $news1->date; ?></p>
                    <p class="title"><?php echo $news1->title; ?></p>
                    <figure><img class="img-responsive" src="img/4.jpg" alt=""></figure>
                    <p class="text"><?php echo $news1->text; ?></p>
                </div>
                <div class="col-md-4">
                    <p class="date"><?php echo $news2->date; ?></p>
                    <p class="title"><?php echo $news2->title; ?></p>
                    <figure><img class="img-responsive" src="img/5.jpg" alt=""></figure>
                    <p class="text"><?php echo $news2->text; ?></p>
                </div>
                <div class="col-md-4">
                    <p class="date"><?php echo $news3->date; ?></p>
                    <p class="title"><?php echo $news3->title; ?></p>
                    <figure><img class="img-responsive" src="img/6.jpg" alt=""></figure>
                    <p class="text"><?php echo $news3->text; ?></p>
                </div>
            </div>
        </div>
    </body>
</html>
