<html>
<head>
	<title>База данных</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php
require_once "config.php";
require_once "User.class.php";
shortUserInfo();
?>

<!--Menu-->
<div align="center">
<h3>Меню </h3>
<form class="menu">
    <input class="menu" type="button" onclick="document.location='index.php'" value="На главную"><br>
    <input class="menu" type="button" onclick="document.location='getklientlist.php'" value="Управление клиентами( список клиентов / удаление)"><br>
    <input class="menu" type="button" onclick="document.location='usd_parse.php'" value="Парсер валют"><br>

    <?php  if ($_SESSION['role'] == "admin") {
        ?>
        <input class="menu" type="button" onclick="document.location='add_admin.php'" value="Добавить администратора"><br>
        <input class="menu" type="button" onclick="document.location='members.php'" value="Список пользователей"><br>
        <?php
    }
    ?>
</form>
</div>
<br><br><br><br><br><br><br><br><br>
<!--/Menu-->


<?php

require_once "footer.php";
?>
