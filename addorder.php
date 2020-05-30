<?php
require_once "config.php";
checkAuth();

// Проверка поля Фамилия на пустоту , избавляет от отправки пустой формы.
if (!isset($_POST['Family']) ||
	!isset($_POST['Name']) ||
	!isset($_POST['BirthDate']) ||
	!isset($_POST['Telefon']) ||
	!isset($_POST['ot4estvo'])
	){
		echo "Поля не заполнены";
	} 
else{
	$zapr1 = $_POST['Family'];
	$zapr2 = $_POST['Name'];
	$zapr3 = $_POST['BirthDate'];
	$zapr4 = $_POST['Telefon'];
	$zapr8 = $_POST['ot4estvo']; 
	// ввод в таблицу клиент
	$s = "INSERT INTO klient (family, name, birthdate, telefon, ot4estvo) VALUES ('$zapr1', '$zapr2', '$zapr3', '$zapr4','$zapr8')";
	
	if (queryMysql($s) == FALSE){
		echo "Ошибка при вставке данных";
		
	}
	else{
		header('Location: getklientlist.php');
	}
}
?>

<html>
<head>
	<title>Добавить заказ</title>
	<meta charset="UTF-8" />
	<link rel="stylesheet" type="text/css" href="style.css">
</head>


<body>
<div align="center">
	<form  name="addorder"  action="addorder.php" method="post">
	<h3>Форма добавления клиента</h3>
		<input class="button" type="text" value="Фамилия" size="30" name="Family" onfocus="value=''" ><br><br>
		<input class="button" type="text" value="Имя" size="30" name="Name" onfocus="value=''" ><br><br>
		<input class="button" type="text" value="Отчество" size="30" name="ot4estvo" onfocus="value=''" ><br><br>
		<input class="button" type="text" value="Дата рождения" size="30" name="BirthDate" onfocus="value=''" ><br><br>
		<input class="button" type="text" value="Телефон" size="30" name="Telefon" onfocus="value=''" ><br><br>
		<input class="button" type="text" value="Депозит" size="30" name="Deposit" placeholder="Данное поле пока не передаёт данные" onfocus="value=''" ><br><br>
		<input class="button" type="submit"  value="Добавить заказ" > <br>
		<input class="button" type="reset"  value="Очистить поля" > <br>
		<input class="button" type="button" value="На главную" onclick= "document.location='index.php'"><br>
	</form>
</div>

</body>
</html>

