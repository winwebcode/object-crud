

<html>
<head>
	<title>Список пользователей</title>
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

</form> 
</div>
<!--/Menu-->

<?php
echo "<div align='center'>";
$s = queryMysql("SELECT * FROM user ORDER by user_id") or die($connect_mysql_base->connect_error); // запрос с сортировкой по user_id


// Выводим заголовок таблицы:
echo "<table border='1' width='40%' bgcolor='yellow'>";
echo "<tr><td>Login</td><td>User ID</td>";

echo "</tr>";

// Выводим таблицу:  , получаем число рядов в выборке
for ($c=0; $c<$s->num_rows; $c++){
	echo "<tr>";
	$f = $s->fetch_array(); 
	echo "<td>$f[login]</td> <td>$f[user_id]</td>";
	echo "</tr>";
}
echo "</table>";

?>




</body>
</html>