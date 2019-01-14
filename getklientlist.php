<html>
<title>Управление списком клиентов</title>
<meta charset="UTF-8" />
<link rel="stylesheet" type="text/css" href="style.css">
<body>

<?php
//ini_set('display_errors', 'Off');
require_once "config.php";
checkAuth(); //проверка авторизации
?>

<div align="center">
 <form>
	<input class="button" type="text" value="Введите ID" name="nomerID" onfocus="value=''"> <br><br>
	<input class="button" type="submit"  value="Удалить клиента" > <br>
	<input class="button" type="reset"  value="Очистить поля" ><br>
	<input class="button" type="button" value="На главную" onclick= "document.location='index.php'"><br><br> 
 </form>
</div>

</body>
</html>


<?php

echo "<div align='center'>";
$s = queryMysql("SELECT * FROM klient") or die($connect_mysql_base->connect_error);
$f = $s->fetch_array();

// Выводим заголовок таблицы:
echo "<table border='1' width='40%' bgcolor='yellow'>";
echo "<tr><td>ID</td><td>Фамилия</td><td>Имя</td><td>Отчество</td><td>Дата рождения</td><td>Телефон</td> <td>Редактирование</td>";

echo "</tr>";

// Выводим таблицу:
for ($c=0; $c<$s->num_rows; $c++){
	echo "<tr>";
	$f = $s->fetch_array(); 
	echo "<td>$f[ID_klient]</td> <td>$f[family]</td> <td>$f[name]</td> <td>$f[ot4estvo]</td> <td>$f[birthdate]</td> <td>$f[telefon]</td>";
	?>
	<td><a href="update.php?ID_klient=<? echo $f['ID_klient']; ?>">Редактировать</a></td>
	<?
	echo "</tr>";
}
echo "</table>";

if (!isset($_GET['nomerID']))	{} 
else{
	// Удаление данных из БД klient
	$drop = $_GET['nomerID'];
	$del ="delete from klient where (ID_klient='$drop')"; 
	queryMysql($del);
	if (queryMysql($del) == True){
		echo "<br><strong>Client number $drop delete</strong>";
	}
}
echo "<br>";


?>