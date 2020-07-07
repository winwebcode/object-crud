<?php
/*update table*/
require_once "config.php";
require_once "User.class.php";
shortUserInfo();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="shortcut icon" href="img/favicon/favicon.png" type="image/x-icon">
        <title>Upload avatar</title>
    </head>
    <body>
        <div align="center">
         <form method='post' action='upload_pic.php' enctype='multipart/form-data'>
          Выберите JPG, GIF, PNG или TIF файл:<br>
          <input type='file' name='filename' value='browse' size='10'><br>
          <input type='submit' name='upload_userpic' value='Upload'><br>
        </form>
        </div><br><br>
        
        
        <!-- choise you avatar -->
        <h3>Выбрать аватар из уже загруженных</h3>
        <form method='post' name="choise_userpic" action='upload_pic.php' enctype='multipart/form-data'>
            <img src="img/userpics/bye.png" width="150" heigth="150"><input type="radio" name="my_userpic" value="bye.png"  border="0" alt="Submit" />
            <img src="img/userpics/beavis.png" width="150" heigth="150"><input type="radio" name="my_userpic" value="beavis.png"  border="0" alt="Submit" />
            <img src="img/userpics/butthead.png" width="150" heigth="150"><input type="radio" name="my_userpic" value="butthead.png"  border="0" alt="Submit" />
            <br><input type='submit' name='choise_userpic' value="Set"><br>
        </form>
<?php
require_once "footer.php";

