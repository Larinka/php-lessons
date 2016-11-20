<?php
$userName = 'Виктория';
$userAge = '30';
$userEmail = 'div-panika@yandex.ru';
$userCity = 'Москва';
$userInfo = 'Почетный член клуба мудрых блондинок';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title><?= $userName ?> - Урок 1</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="main.css">
</head>
<body>
	<div class="container">
		<h1>Информация о пользователе</h1>
		<dl>
			<dt><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Имя</dt>
			<dd><?= $userName ?></dd>
		</dl>
		<dl>
			<dt><span class="glyphicon glyphicon-time" aria-hidden="true"></span>Возраст</dt>
			<dd><?= $userAge ?></dd>
		</dl>
		<dl>
			<dt><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>E-mail</dt>
			<dd><?= $userEmail ?></dd>
		</dl>
		<dl>
			<dt><span class="glyphicon glyphicon-globe" aria-hidden="true"></span>Город</dt>
			<dd><?= $userCity ?></dd>
		</dl>
		<dl>
			<dt><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>О себе</dt>
			<dd><?= $userInfo ?></dd>
		</dl>
	</div>
</body>
</html>

