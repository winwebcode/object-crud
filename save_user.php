<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div align="center">
<?php
/*страница обработчик регистрации , post запросы с reg.php*/
//проверки login / pass
     //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
	if (isset($_POST['login'])) {
		$login = $_POST['login'];
	}
	
	if ($login == '') {
		unset($login);
	}
	
	//заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
    if (isset($_POST['password'])) {
		$password=$_POST['password'];
	}
	
	if ($password =='') {
		unset($password);
	}
    
	//если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
	if (empty($login) or empty($password)) {
		exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }
    
	//если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
	else {
	    $login = stripslashes($login);
		$login = htmlspecialchars($login);
		$password = stripslashes($password);
		$password = htmlspecialchars($password);
	//удаляем лишние пробелы
		$login = trim($login);
		$password = trim($password);
	// подключаемся к базе
		require_once ("config.php");
	// проверка на существование пользователя с таким же логином. Ищем user_id в таблице user, где login = переменной login
		$result = queryMysql("SELECT user_id FROM user WHERE login='$login'");
		$myrow = $result->fetch_array();
	}
	
	// если user уже есть, то обрываем регистрацию
	if (!empty($myrow['user_id'])) {
		exit ("Извините, введённый вами логин уже зарегистрирован.");
	}
	else {
		// если такого нет, то сохраняем данные
		$result2 = queryMysql("INSERT INTO user (login,password) VALUES('$login','$password')");
	}
		
	// Проверяем, есть ли ошибки
	if ($result2=='TRUE') {
		echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='index.php'>Главная страница</a>";
	}
	else {
		echo "Ошибка! Вы не зарегистрированы.";
	}
?>

</div>
</body>
</html>