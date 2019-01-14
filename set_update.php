<html>
<head>
	<meta charset="UTF-8" />
	<title>Применение обновлений</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?
require_once "config.php";
checkAuth();
// Обновление данных в БД klient
	$family = $_POST['Family'];
	$name = $_POST['name'];
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

?>

