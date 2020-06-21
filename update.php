<?php
/*update table*/
require_once "config.php";
require_once "User.class.php";
checkAuth();
?>

<html>
<head>
	<meta charset="UTF-8" />
	<title>Редактирование</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>


<div align="center">

<?php
/* Обновление данных в БД klient */
// Редактирование данных о клиенте
if (!isset($_GET['id_klient']))	{} 
else {
    $id = $_GET['id_klient'];  // приходит из getklientlist.php
    $s = queryMysql("SELECT * FROM klient WHERE (id_klient = '$id')");
    $f = $s->fetch_array();
?>
    <form name="change_data_client" method="GET" action="set_update.php">
    <h3>Форма редактирования</h3>
        <table border='1' width='40%' bgcolor='yellow'>
            <tr><td>ID клиента</td><td>Фамилия</td><td>Имя</td><td>Отчество</td><td>Дата рождения</td><td>Телефон</td></tr>
            <tr>
                <td align="center"> <input type = "text" readonly name="id_klient" value="<?php echo $f['id_klient']; ?>"> </td>
                <td align="center"> <input type="text" name="family" value="<?php echo $f['family']; ?>"> </td>
                <td align="center"> <input type="text" name="name" value="<?php echo $f['name']; ?>"> </td>
                <td align="center"> <input type="text" name="patronymic" value="<?php echo $f['patronymic']; ?>"> </td>
                <td align="center"> <input type="text" name="birth_date" value="<?php echo $f['birth_date']; ?>"> </td>
                <td align="center"> <input type="text" name="phone" value="<?php echo $f['phone']; ?>"> </td>
            </tr>
        </table>
        <br><input type="submit" value="Изменить данные"> 
    </form>
</div>
<?php
}

///////////////////////////////////////////////////// Редактирование паролей юзера
if (!isset($_POST['change_pass'])) {
} 
else { // иначе, если отправлена форма (нажата кнопка) смены пароля, то показываем форму смены пароля
?>

<form method="POST" action="change_pass.php">
    <h3>Форма редактирования</h3>
        <input type="password" name="old_password" value="" placeholder="Действующий пароль"><br>
        <input type="password" name="new_password" value="" placeholder="Новый пароль"><br>
        <input type="submit" name="update_pass" value="Изменить данные"> 
    </form>
</div>

<?php
}
require_once "footer.php";
?>


