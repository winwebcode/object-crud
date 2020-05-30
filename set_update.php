<html>
<head>
	<meta charset="UTF-8" />
	<title>Применение обновлений</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
require_once "config.php";
checkAuth();
$current_user = $_SESSION['login'];

/* Обновление данных в БД klient*/
// Проверка поля Фамилия на пустоту , избавляет от отправки пустой формы.
if (!isset($_POST['Family']) ||
	!isset($_POST['Name']) ||
	!isset($_POST['BirthDate']) ||
	!isset($_POST['Telefon']) ||
	!isset($_POST['ot4estvo']) ||
	!isset($_POST['ID_klient'])
	){
		//echo "Поля не заполнены";
	} 
else{
	$family = $_POST['Family'];
	$name = $_POST['Name'];
	$birthDate = $_POST['BirthDate'];
	$telefon = $_POST['Telefon'];
	$ot4estvo = $_POST['ot4estvo'];
	$id = $_POST['ID_klient'];

	// update
	$upd = "UPDATE klient SET family = '$family' , name = '$name', ot4estvo='$ot4estvo', birthdate = '$birthDate', telefon = '$telefon' WHERE ID_klient = '$id'";
	$result = $connect_mysql_base->query($upd) or die($connect_mysql_base->connect_error);

	if($result){
		echo "<div align='center'>Успех";
		echo "<BR>";
		echo "<a href='getklientlist.php'>Проверить изменения</a></div>";
	}
	else {
		echo "Ошибка";
	}
} /* Конец обновления данных в БД klient*/

/*Обновление данных о юзере, форма user.php*/
//Изменение пароля
if (!isset($_POST['newpassword'])){
		//echo "Поля не заполнены";
	}
else{
	$new_password = $_POST['newpassword'];

	// update
	$upd = "UPDATE user SET password = '$new_password'  WHERE login='$current_user'";
	$result = $connect_mysql_base->query($upd) or die($connect_mysql_base->connect_error);

	if($result){
		echo "<div align='center'>Успех";
		echo "<BR>";
		echo "<a href='user.php'>Проверить изменения</a></div>";
	}
	else {
		echo "Ошибка";
	}
}


?>