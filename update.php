<?php
/*update table*/
require_once "config.php";
require_once "User.class.php";
require_once "Client.class.php";
shortUserInfo();
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
    <form method="GET">
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
        <br><input type="submit" name="change_data_client" value="Изменить данные"> 
    </form>
</div>
<?php
}
require_once "footer.php";



