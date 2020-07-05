<html>
<title>Управление списком клиентов</title>
<meta charset="UTF-8" />
<link rel="stylesheet" type="text/css" href="style.css">
<body>

<?php
require_once "config.php";
require_once "User.class.php";
require_once "Client.class.php";
shortUserInfo();
?>

<div align="center">
 <form method="POST" action="getklientlist.php">
     <input class="button" type="button" onclick="document.location='addorder.php'" value="Добавить клиента"><br>
	<input class="button" type="button" onclick="document.location='search.php'" value="Поиск клиента"><br>
 	<input class="button" type="submit" name="clear_bd" value="Удалить ID > 40"><br><br>
	<input class="button" type="text" value="Введите ID" name="nomerID" onfocus="value=''"><br><br>
	<input class="button" type="submit"  value="Удалить клиента" > <br>
	<input class="button" type="reset"  value="Очистить поля" ><br>
	<input class="button" type="button" value="На главную" onclick= "document.location='index.php'"><br><br>
 </form>
</div>


<?php
getClientsList();
require_once "footer.php";
