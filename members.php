

<html>
<head>
	<title>Список пользователей</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>


<?php
require_once "config.php";
require_once "User.class.php";
checkAuth();

?>


<!--Menu-->
<div align="center">
<h3>Меню </h3>
<form class="menu">
<input class="menu" type="button" onclick="document.location='index.php'" value="На главную"><br>

</form> 
</div>
<!--/Menu-->

<?php
getMembersList();

require_once "footer.php";
?>