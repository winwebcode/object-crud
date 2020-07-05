<?php

require_once "config.php";
require_once "User.class.php";
require_once "Client.class.php";
shortUserInfo();

if ($_SESSION['role'] != "admin") {
	echo "Forbidden";
	//header('Location: index.php');
}
else {
?>
<html>
<head>
	<title>Добавить клиента</title>
	<meta charset="UTF-8" />
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<div align="center">
	<form  action="add_admin.php"  method="POST">
		<input required class="button" type="text" value="Login" size="30" name="reg_login" placeholder="Логин не менее 4 символов"><br><br>
		<input required class="button" type="text" value="Password" size="30" name="reg_password" placeholder="Пароль не менее 6 символов"><br><br>
		<input class="button" type="submit" name="signup_admin"  value="Добавить Админа"> <br>
		<input class="button" type="button" value="На главную" onclick="document.location='index.php'"><br>
	</form>
</div>

<?php
}
require_once "footer.php";
?>