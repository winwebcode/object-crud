<html>
<head>
	<title>Список пользователей</title>
	<link rel="stylesheet" type="text/css" href="style.css">
        <link rel="shortcut icon" href="img/favicon/favicon.png" type="image/x-icon">
</head>
<body>


<?php
require_once "config.php";
require_once "User.class.php";
?>


<!--Menu-->
<div align="center">
<h3>Меню </h3>
<form class="menu">
    <input class="menu" type="button" value="Обновить favicon" onclick="document.location='favicon.php'"><br>

</form> 
</div>
<!--/Menu-->

<?php
require_once "footer.php";