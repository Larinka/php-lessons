<?php

    class WebNews {
        public $date;
        public $title;
        public $text;

        public function getDate($date) {
            return $this->date = $date;
        }
        public function getTitle($title) {
            return $this->title = $title;
        }
        public function getText($text) {
            return $this->text = $text;
        }
    }
    $news1 = new WebNews();
    $news2 = new WebNews();
    $news3 = new WebNews();
    $news4 = new WebNews();
    $news5 = new WebNews();
    $news6 = new WebNews();

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
                    <p class="date"><?php echo $news1->getDate('20/12/16'); ?></p>
                    <p class="title"><?php echo $news1->getTitle('В Дубае вывели универсальную формулу счастья для всех'); ?></p>
                    <figure><img class="img-responsive" src="img/1.jpg" alt=""></figure>
                    <p class="text"><?php echo $news1->getText('Дубай, ОАЭ. Специалисты управления свободной зоны «Силиконовый оазис Дубая» вывели универсальную формулу счастья, которая выглядит как «Счастье = Реальность – Ожидания».  По мнению департамента счастья управления, для измерения уровня счастья важны не только материальные понятия, но и также эмоции, чувства и состояние сознания – все это влияет на продуктивность работы и качество жизни человека.'); ?></p>
                </div>
                <div class="col-md-4">
                    <p class="date"><?php echo $news2->getDate('20/12/16'); ?></p>
                    <p class="title"><?php echo $news2->getTitle('Samsung принудительно отключат Galaxy Note 7 в России'); ?></p>
                    <figure><img class="img-responsive" src="img/2.jpg" alt=""></figure>
                    <p class="text"><?php echo $news2->getText('Во избежание продолжения истории с возгорающимися гаджетами, компания Samsung Electronics приняла решение вслед за полным отзывом Galaxy Note 7 принудительно отключить оставшиеся «на руках» смартфоны данной модели. Уже в ближайшее время данная участь постигнет и девайсы, использующиеся в России.'); ?></p>
                </div>
                <div class="col-md-4">
                    <p class="date"><?php echo $news3->getDate('20/12/16'); ?></p>
                    <p class="title"><?php echo $news3->getTitle('Полное управление: новый Lamborghini Aventador S'); ?></p>
                    <figure><img class="img-responsive" src="img/3.jpg" alt=""></figure>
                    <p class="text"><?php echo $news3->getText('В оснащение Aventador S входит система выбора режимов движения с настройками Strada, Sport, Corsa и новой Ego под конкретного водителя, воздействующими на силовой агрегат, трансмиссию, рулевое управление и подвеску, а также углерод-керамические тормозные диски.'); ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p class="date"><?php echo $news4->getDate('19/12/16'); ?></p>
                    <p class="title"><?php echo $news4->getTitle('Роман Широков заявил о готовности возобновить карьеру'); ?></p>
                    <figure><img class="img-responsive" src="img/4.jpg" alt=""></figure>
                    <p class="text"><?php echo $news4->getText('Футбольный агент Арсен Минасов, представляющий интересы экс-капитана сборной России Романа Широкова заявил о готовности спортсмена вернуться в профессиональный футбол, если ему поступит достойное предложение.'); ?></p>
                </div>
                <div class="col-md-4">
                    <p class="date"><?php echo $news5->getDate('19/12/16'); ?></p>
                    <p class="title"><?php echo $news5->getTitle('Журнал Interview прекращает работу в России'); ?></p>
                    <figure><img class="img-responsive" src="img/5.jpg" alt=""></figure>
                    <p class="text"><?php echo $news5->getTitle('Российская версия популярного американского журнала Interview прекращает свое существование как в печатном, так и в электронном виде. Об этом ТАСС сообщили в пресс-службе издания. Соответствующее решение принято в связи с окончанием лицензии, а также сложной экономической ситуацией в стране.'); ?></p>
                </div>
                <div class="col-md-4">
                    <p class="date"><?php echo $news6->getDate('18/12/16'); ?></p>
                    <p class="title"><?php  echo $news6->getTitle('ФАС отложила рассмотрение дела против Microsoft'); ?></p>
                    <figure><img class="img-responsive" src="img/6.jpg" alt=""></figure>
                    <p class="text"><?php echo $news6->getTitle('Федеральная антимонопольная служба (ФАС) России перенесла рассмотрение дела против корпорации Microsoft о злоупотреблении доминирующим положением на рынке предварительно на конец января.'); ?></p>
                </div>
            </div>
        </div>
    </body>
</html>
