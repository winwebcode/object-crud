<html>
<title>Управление списком клиентов</title>
<meta charset="UTF-8" />
<link rel="stylesheet" type="text/css" href="style.css">
<body>

<?php
require_once "config.php";
require_once "User.class.php";
?>

<div align="center">
 <form>

	<input class="button" type="button" value="На главную" onclick= "document.location='index.php'"><br><br>
 </form>
</div>


<?php
userInfo();
require_once "footer.php";
