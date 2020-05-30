<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div align="center">
<?php
require_once "config.php";

/*страница обработчик регистрации , post запросы с reg.php*/
//проверки login / pass
     
	if (isset($_POST['login']) and isset($_POST['password'])) {
		$login = $_POST['login'];
		$password=$_POST['password'];
	} else{exit;}
	
	//заносим введенный пользователем логин пароль в переменную $password, если он пустой, то уничтожаем переменную
	if ($login == '' or $password =='' or empty($login) or empty($password) or strlen($login)<4 or strlen($password)<6) {
		unset($login);
		unset($password);
		exit ("Вы ввели не всю информацию или логин / пароль слишком короткие, вернитесь назад и заполните все поля!");
	}
	    
	//если логин и пароль введены, то обрабатываем их
	else {
	    $login = stripslashes($login);
		$login = htmlspecialchars($login);
		$password = stripslashes($password);
		$password = htmlspecialchars($password);
	//удаляем лишние пробелы
		$login = trim($login);
		$password = trim($password);
	// проверка на существование пользователя с таким же логином. Ищем user_id в таблице user, где login = переменной login
		$result = queryMysql("SELECT user_id FROM user WHERE login='$login'");
		$myrow = $result->fetch_array();
	}
	
	// если user уже есть, то обрываем регистрацию
	//	if (!empty($myrow)){ // так тоже работает, как правильно?
	if (!empty($myrow['user_id'])) {
		exit ("Извините, введённый вами логин уже зарегистрирован.");
	}
	else {
		// если такого нет, то сохраняем данные
		$result2 = queryMysql("INSERT INTO user (login,password) VALUES('$login','$password')");
	}
		
	// Проверяем, есть ли ошибки
	if ($result2=='TRUE') {
		echo "Вы успешно зарегистрированы! Теперь вы можете авторизоваться. <a href='index.php'>Главная страница</a>";
	}
	else {
		echo "Ошибка! Вы не зарегистрированы.";
	}
?>

</div>
</body>
</html>