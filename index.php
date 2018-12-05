

<html>
<head>
	<title>База данных</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>


<?php

require_once "config.php";
//проверка авторизации
checkAuth();

?>


<!--Menu-->
<div align="center">
<h3>Меню </h3>
<form class="menu">
<input class="menu" type="button" onclick="document.location='index.php'" value="На главную"><br>
<input class="menu" type="button" onclick="document.location='addorder.php'" value="Добавить клиента"><br>
<input class="menu" type="button" onclick="document.location='getklientlist.php'" value="Управление клиентами( список клиентов / удаление)"><br>
<input class="menu" type="button" onclick="document.location='search.php'" value="Поиск клиента"><br>



</form> 
</div>
<!--/Menu-->
</body>
</html>