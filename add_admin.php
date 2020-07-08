<?php

require_once "config.php";
require_once "User.class.php";
require_once "Client.class.php";
shortUserInfo();

if (checkAdmin()) {
?>
<html>
<head>
	<title>Добавить клиента</title>
	<meta charset="UTF-8" />
	<link rel="stylesheet" type="text/css" href="style.css">
        <link rel="shortcut icon" href="img/favicon/favicon.png" type="image/x-icon">
</head>

<div align="center">
	<form  action="add_admin.php"  method="POST">
            <input required class="button" minlength="4" type="text" size="30" name="reg_login" placeholder="Логин не менее 4 символов"><br><br>
            <input required class="button" minlength="6" type="text" size="30" name="reg_password" placeholder="Пароль не менее 6 символов"><br><br>
            <input class="button" type="submit" name="signup_admin"  value="Добавить Админа"> <br>
            <input class="button" type="button" value="На главную" onclick="document.location='index.php'"><br>
	</form>
</div>

<?php
}
else {header('Location: index.php');}
require_once "footer.php";
