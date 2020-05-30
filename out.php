<?php
function goexit(){
	session_start();
	$sess_user_id = $_SESSION['user_id'];
	unset ($_SESSION['user_id']);
	session_destroy();
	header('Location: index.php');
}
goexit();
 ?>