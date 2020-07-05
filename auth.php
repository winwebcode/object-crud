<?php
require_once "config.php";
require_once "User.class.php";
?>
<html>
<title>Авторизация</title>
<meta charset="UTF-8" />
<link rel="stylesheet" type="text/css" href="style.css">
<body>
	<div class="blocker" align="center">  
		<br><br>
		<form method="POST">  <!-- обработчик авторизации-->
                    <input required class="auth" name="login" value="" type="text" size="20" maxlength="20" placeholder="Логин"><br>
                    <input required class="auth" name="password" value="" type="password" size="20" maxlength="20" placeholder="Пароль"><br>
			<input class="auth" type="submit" name="autharization" value="Войти"><br>
			<a  href="reg.php">Регистрация</a><br>
		</form>
	</div>
<?php
require_once "footer.php";
