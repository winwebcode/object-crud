<html>
<head>
	<title>Регистрация</title>
	
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<div align="center">
	<form  action="save_user.php" method="post">
		<input class="button" type="text" value="Login" size="30" name="login" onfocus="value=''" ><br><br>
		<input class="button" type="text" value="Password" size="30" name="password" onfocus="value=''" ><br><br>
		<input class="button" type="submit"  value="Регистрация" > <br>
		<input class="button" type="button" value="На главную" onclick= "document.location='index.php'"><br>
	</form>
</div>



<?
require_once "config.php";
require_once "footer.php";
 ?>
 
 </body>
</html>