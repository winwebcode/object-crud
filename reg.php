<?php
require_once "config.php";
require_once "User.class.php";
?>
<html>
<head>
	<title>Регистрация</title>
	
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<div align="center">
	<form  action="reg.php"  method="POST">
		<input required class="button" type="text" value="Login" size="30" name="reg_login" placeholder="Не менее 4 символов" onfocus="value=''" ><br><br>
		<input required class="button" type="text" value="Password" size="30" name="reg_password" placeholder="Не менее 6 символов" onfocus="value=''" ><br><br>
		<input class="button" type="submit" name="signup"  value="Регистрация"> <br>
		<input class="button" type="button" value="На главную" onclick="document.location='index.php'"><br>
	</form>
</div>


<?php
require_once "footer.php";
?>