<?php
require_once "config.php";
require_once "User.class.php";
?>
<html>
<head>
<title>Авторизация</title>
<meta charset="UTF-8" />
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="shortcut icon" href="img/favicon/favicon.png" type="image/x-icon">
<script src="js/script.js" type="text/javascript"></script>
</head>

<body>
	<div class="blocker" align="center">  
		<br><br>
		<form method="POST">  <!-- обработчик авторизации-->
                    <input required class="auth" name="login" value="" type="text" size="20" maxlength="20" placeholder="Логин"><br>
                    <span class="password">
                    <input required class="auth" id="password-input" name="password" value="" type="password" size="20" maxlength="20" placeholder="Пароль"><br>
                    <a href="#" class="password-control" onclick="return show_hide_password(this);"></a> </span>
                    <input class="auth" type="submit" name="autharization" value="Войти"><br>
                    <a  href="reg.php">Регистрация</a><br>
		</form>
	</div>
<?php
require_once "footer.php";
