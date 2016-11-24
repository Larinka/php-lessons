<?php
error_reporting(E_ALL);

$message = 'Угадайте число от 1 до 100';
$passed = 0;

if (isset($_POST['id'])) {
	$passed = 1;
	$user_number = $_POST['user_number'];
	$correct_number = $_POST['correct_number']; 

	if ($user_number < $_POST['correct_number']) { 
		$message = "Загаданное число больше $user_number";
	} 

	if ($user_number > $_POST['correct_number']) { 
		$message = "Загаданное число меньше $user_number"; 
	}

	if ($user_number == $_POST['correct_number']) {
		$message = 'Вы угадали число!'; 
	}
} 
else {
	$user_number = '';
	$correct_number = rand(0, 100);
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<title>Угадай число</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="main.css">
</head>
<body>
	<div class="container">
		<h1><?php echo $message; ?></h1>
		<?php if($passed == 0) :?>
		<form method="post" class="form-inline">
			<input type="number" class="form-control" min="1" max="100" value="<?php echo $user_number ?>" name="user_number" />
			<button type="submit" name="id" class="btn btn-info">Отправить</button>
			<input type="hidden" name="correct_number" value="<?php echo $correct_number ?>" />
		</form>
		<?php else: ?>
		<a href="guess.php" class="btn btn-info">Попробовать снова</a>
		<?php endif;?>
	</div>
</body>
</html>