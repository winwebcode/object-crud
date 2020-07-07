<?php
require_once "config.php";
require_once "User.class.php";
require_once "Client.class.php";
shortUserInfo();
?>

<html>
<head>
	<title>Добавить клиента</title>
	<meta charset="UTF-8" />
	<link rel="stylesheet" type="text/css" href="style.css">
        <link rel="shortcut icon" href="img/favicon/favicon.png" type="image/x-icon">
</head>


<body>
<div align="center">
	<form action="addorder.php" method="POST">
	<h3>Форма добавления клиента</h3>
        <input required class="button" type="text" value="" size="30" name="family" placeholder="Фамилия" ><br><br>
		<input required class="button" type="text" value="" size="30" name="name" placeholder="Имя" ><br><br>
		<input required class="button" type="text" value="" size="30" name="patronymic" placeholder="Отчество" ><br><br>
		<input required class="button" type="text" value="" size="30" name="birth_date" placeholder="Дата рождения" ><br><br>
		<input required class="button" type="text" value="" size="30" name="phone" placeholder="Телефон" ><br><br>
		<input class="button" type="text" value="" size="30" name="deposit" placeholder="Депозит. Данное поле пока не передаёт данные" placeholder="" ><br><br>
		<input class="button" type="submit" name="add_client"  value="Добавить клиента" > <br>
		<input class="button" type="reset"  value="Очистить поля" > <br>
		<input class="button" type="button" value="На главную" onclick= "document.location='index.php'"><br>
	</form>
</div>

<?php
require_once "footer.php";

