<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
require_once "config.php";
require_once "User.class.php";
shortUserInfo();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="shortcut icon" href="img/favicon/favicon.png" type="image/x-icon">
        <title>Change your password</title>
    </head>
    <body>
    <div align="center">
        <form method="POST">
        <h3>Форма редактирования</h3>
        <input required type="password" name="old_password" value="" placeholder="Действующий пароль"><br>
        <input required type="password" name="new_password" value="" placeholder="Новый пароль"><br>
        <input type="submit" name="update_pass" value="Изменить данные"> 
        </form>
    </div>
    </body>
</html>
