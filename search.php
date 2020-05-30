<?php
require_once "config.php";
checkAuth();
// проверка на пустоту поля 'poisk'
if (!isset($_GET['poisk']))	{} 
else{
	$family=$_GET['poisk'];
	// Поиск с выборкой заданой в поле poisk
	$search ="SELECT * FROM klient where family LIKE '$family%'"; 
	$resultat = queryMysql($search);
	

	//Если в таблице больше 0 записей, удовлетворяющих выборке то
	if ($resultat->num_rows!= 0) {
		//шапка таблицы
		echo "<div align='center'>";
		echo "<table border='1' width='40%' bgcolor='yellow'>";
		echo "<tr><td>ID</td><td>Фамилия</td><td>Имя</td><td>Отчество</td><td>Дата рождения</td><td>Телефон</td>";
		echo "</tr>";
		// Выводим таблицу:
		for ($c=0; $c<$resultat->num_rows; $c++){
			echo "<tr>";
			$f = $resultat->fetch_array();
			echo "<td>$f[ID_klient]</td> <td>$f[family]</td> <td>$f[name]</td> <td>$f[ot4estvo]</td> <td>$f[birthdate]</td> <td>$f[telefon]</td>";
			echo "</tr>";
		}
		//Конец таблицы
		echo "</table> </div><br>";
	
	}
	else {echo "<div align='center'>Клиент не найден</div>";}
}
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

</body>
</html>

