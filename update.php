<?
/*update table*/

require_once "config.php";

// Обновление данных в БД klient
$id=$_GET['ID_klient'];  // приходит из getklientlist.php
$s = $connect_mysql_base->query("SELECT * FROM klient WHERE (ID_klient='$id') ") or die($connect_mysql_base->connect_error);
//$s = query("SELECT * FROM klient WHERE (ID_klient='$id') ") or die($connect_mysql_base->connect_error);
$f = $s->fetch_array();

?>

<html>
<head>
	<meta charset="UTF-8" />
	<title>Редактирование</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>


<div align="center">
	<form name="update" method="post" action="set_update.php">
	<h3>Форма редактирования</h3>
		<table border='1' width='40%' bgcolor='yellow'>
			<tr><td>ID клиента</td><td>Фамилия</td><td>Имя</td><td>Отчество</td><td>Дата рождения</td><td>Телефон</td></tr>
			<tr>
				<td align="center"> <input type="text" readonly name="ID_klient" value="<? echo $f['ID_klient']; ?>"> </td>
				<td align="center"> <input type="text" name="Family" value="<? echo $f['family']; ?>"> </td>
				<td align="center"> <input type="text" name="name" value="<? echo $f['name']; ?>"> </td>
				<td align="center"> <input type="text" name="ot4estvo" value="<? echo $f['ot4estvo']; ?>"> </td>
				<td align="center"> <input type="text" name="BirthDate" value="<? echo $f['birthdate']; ?>"> </td>
				<td align="center"> <input type="text" name="Telefon" value="<? echo $f['telefon']; ?>"> </td>
			</tr>
		</table>
		<br><input type="submit" value="Изменить данные"> 
	</form>
</div>

</body>
</html>


