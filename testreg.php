<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div align="center">

<?php
/*******file auth, обработчик авторизации*/
require_once "config.php";
session_start();//  старт сессии
	//заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
if (isset($_POST['login'])) {
	$login = $_POST['login'];
} 
if ($login == ''){
	unset($login);
}
//заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
if (isset($_POST['password'])){
	$password=$_POST['password'];
}

if ($password == ''){
	unset($password);
}
    
	//если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
if (empty($login) or empty($password)){
	exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
}
    //если логин и пароль введены, обрабатываем их, чтобы теги и скрипты не работали
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
	$password = stripslashes($password);
    $password = htmlspecialchars($password);
//удаляем лишние пробелы
    $login = trim($login);
    $password = trim($password);
 
 //извлекаем из базы все данные о пользователе
$resultat = queryMysql("SELECT * FROM user WHERE login='$login'"); 
$myrow = $resultat->fetch_array();
	//если пользователя с введенным логином/паролем не существует
    if (empty($myrow['password'])){
		exit ("Извините, введённый вами логин или пароль неверный.");
    }
	//если существует, то сверяем пароли
    else{ 
		if ($myrow['password']==$password){
			//если пароли совпадают, то запускаем сессию
			$_SESSION['login']=$myrow['login']; 
			$_SESSION['user_id']=$myrow['user_id'];
			echo "Авторизация прошла успешно! <a href='index.php'>Главная страница</a>";
			//редирект на главную
			header('Location: index.php');
		}
		else{
			//если пароли не сошлись
			exit ("Извините, введённый вами логин или пароль неверный.");
		}
    }
?>
	
</div>
</body>
</html>