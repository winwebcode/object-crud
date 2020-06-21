<?php
require_once "config.php";
require_once "User.class.php";
require_once "Client.class.php";
checkAuth();
?>

<html>
<head>
	<title>Поиск клиентов</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div align="center">
	<form method="GET" action="search.php">
		<input class="button"  type="text" value="Введите Фамилию" name="poisk" onfocus="value=''"> <br><br> 
		<input class="button" type="submit"  value="Поиск" > <br>
		<input class="button" type="button" value="На главную" onclick= "document.location='index.php'"><br>	
	</form>
</div>

<?php
require_once "footer.php";
?>

