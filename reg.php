<?php
require_once "config.php";
require_once "User.class.php";
?>
<html>
<head>
	<title>Регистрация</title>
	<link rel="stylesheet" type="text/css" href="style.css">
        <link rel="shortcut icon" href="img/favicon/favicon.png" type="image/x-icon">
</head>
 <script src="js/script.js" type="text/javascript"></script>
<div align="center">
	<form  action="reg.php"  method="POST">
		<input required class="button" type="text" value="Login" size="30" name="reg_login" minlength="4" placeholder="Не менее 4 символов" onfocus="value=''" ><br><br>
                <span class="password"><input required class="button" type="password" value="Password" id="password-input" size="30" name="reg_password" placeholder="Не менее 6 символов" minlength="6" onfocus="value=''"><br><br>
                <a href="#" class="password-control" onclick="return show_hide_password(this);"></a> </span>
		<input class="button" type="submit" name="signup"  value="Регистрация"> <br>
		<input class="button" type="button" value="На главную" onclick="document.location='index.php'"><br>
	</form>
</div>



<?php
require_once "footer.php";
