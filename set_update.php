<?php
require_once "config.php";
require_once "User.class.php";
checkAuth();

/* Обновление данных в таблице klient */
// Проверка полей на пустоту , избавляет от отправки пустой формы.

	if (!isset($_GET['family']) ||
		!isset($_GET['name']) ||
		!isset($_GET['birth_date']) ||
		!isset($_GET['phone']) ||
		!isset($_GET['patronymic']) ||
		!isset($_GET['id_klient'])
		) {
			echo "Поля не заполнены";
		} 
	else {
		$family = $_GET['family'];
		$name = $_GET['name'];
		$birth_date = $_GET['birth_date'];
		$phone = $_GET['phone'];
		$patronymic = $_GET['patronymic'];
		$id = $_GET['id_klient'];

		// update
		
		if (queryMysql("UPDATE klient SET family = '$family' , name = '$name', patronymic='$patronymic', birth_date = '$birth_date', phone = '$phone' WHERE id_klient = '$id'") == TRUE) {
			//echo "<div align='center'>Успех</div><br>";
			header('Location: getklientlist.php');
		}
		else {
			echo "Ошибка";
		}
	}
?>