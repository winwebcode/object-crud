<?php
//ini_set('error_reporting', 0);
//ini_set('display_errors', 0);

//database data
$db_host='localhost';
$db_name='cdrom';
$db_login='root';
$db_pass='vertrigo';

$connect_mysql_base = new mysqli($db_host, $db_login, $db_pass, $db_name);
if ($connect_mysql_base->connect_error){
	die($connect_mysql_base->connect_error);
}

//functions

function queryMysql($query){
global $connect_mysql_base;
$result = $connect_mysql_base->query($query);
	if ($result == FALSE){
		die($connect_mysql_base->error);
	}

	return $result;
$result->close(); //освобождаем память
}

function createTable($name, $query)
{
queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
echo "Таблица '$name' создана или уже существовала ранее<br>";
}

function goexit(){
	//session_start();
	if (isset($_POST['logout'])) {
	
	$sess_user_id = $_SESSION['user_id'];
	unset ($_SESSION['user_id']);
	session_destroy();
	header('Location: index.php');
	}
}

//проверка авторизации
function checkAuth(){
session_start();
 if ( empty ($_SESSION['login']) || empty ($_SESSION['user_id'])  ) {
	echo "Авторизуйтесь чтобы видеть информацию<br>";

	?>
	<!-- форма авторизации-->
<div class="blocker" align="center">  
  <br><br>
    <form   action="testreg.php" method="post">  <!-- обработчик авторизации-->
    <input class="auth" name="login" value="Логин" onfocus="value=''" type="text" size="20" maxlength="20"><br>
    <input class="auth" name="password" value="Пароль" onfocus="value=''" type="password" size="20" maxlength="20"><br>
    <input class="auth" type="submit" name="submit" value="Войти"><br>
	<a  href="reg.php">Регистрация</a><br>
	</form>
</div>
	<?	
	exit();
 }
 
 else{
 
 $random_otvet=rand(1,5);
  switch ($random_otvet){
  case 1:
  $otvet="Выйти проветриться";
  break;
  case 2:
  $otvet="Выйти из админки";
  break;
  case 3:
  $otvet="Выйти за чаем";
  break;
  case 4:
  $otvet="Выйти за кофе";
  break;
  case 5:
  $otvet="Пора спать";
  break;
  default:
  print "error"; 
  }
 
	echo "Вы вошли как ".$_SESSION['login']." ";
	?> <br><a name="logouts" href="out.php"><?php echo "$otvet";?></a><br><br> <?
	
	//добавить : если находишься на reg.php редиректить на главную
 }
}
?>