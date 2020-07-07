<?php
//ini_set('error_reporting', 0);
//ini_set('display_errors', 0);
session_start();
//database data
$db_host='localhost';
$db_name='cdrom';
$db_login='root';
$db_pass='vertrigo';

$connect_mysql_base = new mysqli($db_host, $db_login, $db_pass, $db_name);

if ($connect_mysql_base->connect_error)	{
	die($connect_mysql_base->connect_error);
}

//SQL query

function queryMysql($query)	{
	global $connect_mysql_base;
	$result = $connect_mysql_base->query($query);
	
	if ($result == FALSE) {
		die($connect_mysql_base->error);
	}
	return $result;
}

//Safe SQL, delete suspicious symbols in query

function getSafePost($var) {
	global $connect_mysql_base;
	return $connect_mysql_base->real_escape_string($_POST[$var]);
}

function createTable($name, $query) {
	queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
	echo "Таблица '$name' создана или уже существовала ранее<br>";
}

function uploadFavicon() {
    $userdata = checkAuth();
    $current_user = $userdata['current_user'];
    if ($_FILES) {
        $name = $_FILES['filename']['name'];
        switch($_FILES['filename']['type']) {
          case 'image/x-icon': $ext = 'ico'; break;
          case 'image/png': $ext = 'png'; break;
          default:           $ext = '';    break;
        }
        if ($ext) {
            $favicon_path = "img/favicon/favicon.$ext";
            move_uploaded_file($_FILES['filename']['tmp_name'], $favicon_path);
            queryMysql("UPDATE settings SET favicon = '$favicon_path'");
        }
        else {
            echo "$name is not an accepted image file";
        }
    }
    else { 
      echo "No image has been uploaded";
    }
}