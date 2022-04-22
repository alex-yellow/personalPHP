<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
</head>
<body>
<form action="" method="POST">
    <h3>Введите логин</h3>
	<input name="login">
    <h3>Введите пароль</h3>
	<input name="password" type="password"><br><br>
	<input type="submit">
</form>
<?php include_once "db.php"; ?>
<?php
	if (!empty($_POST['password']) and !empty($_POST['login'])) {
		$login = $_POST['login'];
		$password = md5($_POST['password']);
		
		$query = "SELECT * FROM users WHERE login='$login' AND password='$password'";
		$result = mysqli_query($link, $query);
		$user = mysqli_fetch_assoc($result);
		
		if (!empty($user)) {
			$_SESSION['auth'] = true;
            echo '<script>location.href="index.php";</script>';
		} else {
			echo "неверно ввел логин или пароль";
		}
	}
?>
</body>
</html>