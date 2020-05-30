<?php
/*update table*/

require_once "config.php";
checkAuth();
?>

<html>
<head>
	<meta charset="UTF-8" />
	<title>Редактирование</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>


<div align="center">

<?php
/* Обновление данных в БД klient */
// Редактирование данных о клиенте
if (!isset($_GET['ID_klient']))	{} 
else{
$id=$_GET['ID_klient'];  // приходит из getklientlist.php
$s = $connect_mysql_base->query("SELECT * FROM klient WHERE (ID_klient='$id') ") or die($connect_mysql_base->connect_error);
$f = $s->fetch_array();
?>
	<form name="update" method="post" action="set_update.php">
	<h3>Форма редактирования</h3>
		<table border='1' width='40%' bgcolor='yellow'>
			<tr><td>ID клиента</td><td>Фамилия</td><td>Имя</td><td>Отчество</td><td>Дата рождения</td><td>Телефон</td></tr>
			<tr>
				<td align="center"> <input type="text" readonly name="ID_klient" value="<?php echo $f['ID_klient']; ?>"> </td>
				<td align="center"> <input type="text" name="Family" value="<?php echo $f['family']; ?>"> </td>
				<td align="center"> <input type="text" name="Name" value="<?php echo $f['name']; ?>"> </td>
				<td align="center"> <input type="text" name="ot4estvo" value="<?php echo $f['ot4estvo']; ?>"> </td>
				<td align="center"> <input type="text" name="BirthDate" value="<?php echo $f['birthdate']; ?>"> </td>
				<td align="center"> <input type="text" name="Telefon" value="<?php echo $f['telefon']; ?>"> </td>
			</tr>
		</table>
		<br><input type="submit" value="Изменить данные"> 
	</form>
</div>
<?php
}

// Редактирование паролей юзера
if (!isset($_POST['change_pass'])) {echo "no";} 
else{

//обновление данных юзера
$pass = $_POST['change_pass'];  // приходит из user.php
$s = $connect_mysql_base->query("SELECT * FROM user WHERE (password='$pass') ") or die($connect_mysql_base->connect_error);

$f = $s->fetch_array();
?>

<form name="update" method="post" action="set_update.php">
	<h3>Форма редактирования</h3>
		
		<input type="password" name="newpassword" value="новый пароль" onfocus="value=''"><br>	
		<input type="submit" value="Изменить данные"> 
	</form>
</div>
<?php
}




?>
</body>
</html>


