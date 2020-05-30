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

	<input class="button" type="button" value="На главную" onclick= "document.location='index.php'"><br><br>
 </form>
</div>

</body>
</html>


<?php
$current_user = $_SESSION['login'];

echo "<div align='center'>";
$s = queryMysql("SELECT * FROM user WHERE login='$current_user' ORDER BY user_id") or die($connect_mysql_base->connect_error); 

// Выводим заголовок таблицы:
echo "<table border='1' width='40%' bgcolor='yellow'>";
echo "<tr><td>User ID</td><td>Login</td><td>Password</td>";

echo "</tr>";

// Выводим таблицу:  , получаем число рядов в выборке , $c меньше кол-ва рядов в выборке ($s->num_rows).
for ($c=0; $c<$s->num_rows; $c++){
	echo "<tr>";
	$f = $s->fetch_array(); 
	echo "<td>$f[user_id]</td><td>$f[login]</td> <td> <form method='post' action='update.php'><input type='submit' name='change_pass' value='Изменить пароль'></form></td>";
	echo "</tr>";
}
echo "</table>";




?>