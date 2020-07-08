<?php
/*Class User - Autharization, change password, check autharization,
 * ban and unban, list of members, save user,
 *  sign out, info about current user*/

/* Sign Out */
if (isset($_GET['sign_out'])) {
    signOut();
}

function signOut() {
    $current_user = $_SESSION['login'];
    $client_ip = $_SERVER['REMOTE_ADDR'];
    $today_date_time = date("D M j H:i:s e Y"); 
    $last_login_log = "IP: $client_ip, Дата: $today_date_time";
    //add log auth to DB
    if (queryMysql("UPDATE user SET log = '$last_login_log' WHERE login = '$current_user'")) {
    }
    else {
        echo "Ошибка логирования";
    }
    session_destroy();
    header('Location: logout.php');
}

/* Check authorization */
function checkAuth() {
    //session_start();
    if (empty($_SESSION['login']) || empty ($_SESSION['user_id']) || empty ($_SESSION['role'])) {
	header('Location: auth.php');	
    }
    //если уже авторизован - показываем ссылку на выход / имя пользователя и прочее
    else {	
        $client_ip = $_SERVER['REMOTE_ADDR'];
	$user_id = $_SESSION['user_id'];
	$current_user = $_SESSION['login'];
	$role = $_SESSION['role'];
    }
return $userdata = ['current_user'=>"$current_user", 'user_id'=>"$user_id", 'role'=>"$role", 'client_ip'=>"$client_ip"];
}

/* Get login / pass and check it */
function safeCheckLogPass() {
	// get data login / pass
	if (isset($_POST['reg_login']) and isset($_POST['reg_password'])) {
		$login = $_POST['reg_login'];
		$password = $_POST['reg_password'];
	}
	
	if (isset($_POST['login']) and isset($_POST['password'])) {
		$login = $_POST['login'];
		$password = $_POST['password'];
		// обработка логина пароля для безопасности
		$login = stripslashes($login);
		$login = htmlspecialchars($login);
		$login = trim($login);
		$password = stripslashes($password);
		$password = htmlspecialchars($password);
		$password = trim($password);
	}
	
	// check data
	if ($login == '' or $password == '' or empty($login) or empty($password) or strlen($login)<4 or strlen($password)<6 or $login == $password) {
		unset($login);
		unset($password);
		exit("Возможно, вы ввели не всю информацию, логин = пароль или являются слишком короткие, вернитесь назад и заполните поля корректно!");
	} else {}
	
	return $userdata = ['login'=>"$login", 'password'=>"$password"];
}

/* Registration and add user, form on reg.php */
if (isset($_POST['signup'])) {
    // добавить проверку авторизован ли юзер
    saveUser("user");
}

// Add admin
if (isset($_POST['signup_admin'])) {
    saveUser("admin");
}

function saveUser($role) {
		$userdata = safeCheckLogPass();
		$login = $userdata['login'];
		$password = $userdata['password'];
		$hash_auth_password = password_hash("$password", PASSWORD_DEFAULT); // хэшируем введённый пароль
	// проверка на существование пользователя с таким же логином. Ищем user_id в таблице user, где login = переменной login
		$result = queryMysql("SELECT user_id FROM user WHERE login='$login'");
		$myrow = $result->fetch_array();
	
	// если user уже есть, то обрываем регистрацию
	if (!empty($myrow['user_id'])) {
		exit ("Извините, введённый вами логин уже зарегистрирован.");
	}
	else {
		// если такого нет, то сохраняем данные и проверяем, есть ли ошибки
		if (queryMysql("INSERT INTO user (login, password, role) VALUES('$login','$hash_auth_password','$role')")) {
			echo "Пользователь добавлен. <a href='index.php'>Главная страница</a>";
		}
		else {
			echo "Ошибка! Вы не зарегистрированы.";
		}
	}		
}

/* Autharization */
if (isset($_POST['autharization'])) {
	autharization();
}

function autharization() {
	//session_start();
	// check forms and passwords
	$userdata = safeCheckLogPass();
	$login = $userdata['login'];
	$password = $userdata['password'];
	//извлекаем из базы все данные о пользователе
	$resultat = queryMysql("SELECT * FROM user WHERE login='$login'"); 
	$myrow = $resultat->fetch_array();

	//если пользователя с введенным логином не существует
    if (empty($myrow['login'])) {
		exit ("Извините, введённый вами Логин неверный."); // не пишем сообщение что этот логин занят, защита от перебора
    }
	//если существует, то сверяем пароли
    else { 
		$db_pass_hash = $myrow['password'];  // присваиваем хэш пароля из БД нашей переменной
		if (password_verify("$password", "$db_pass_hash") and $myrow['ban'] == '') {	//если пароль равен хэшу пароля, то запускаем сессию
			
			$_SESSION['login'] = $myrow['login']; 
			$_SESSION['user_id'] = $myrow['user_id'];		
			$_SESSION['role'] = $myrow['role'];
			header('Location: index.php');
		}
		else {
			echo "Извините, введённый вами логин или пароль неверный_2 или вы забанены.";
		}
    }
}	

/* Change user password request user.php -> upd_pass.php */

if (isset($_POST['update_pass'])) {
    changePass();
}

function changePass() {
	$userdata = checkAuth();
	$current_user = $userdata['current_user'];

	if (!isset($_POST['new_password']) and !isset($_POST['old_password']) or ($_POST['new_password']) == ($_POST['old_password']) or strlen($_POST['new_password'])<6) {
            echo "Пароли не введены, равны между собой или менее 6 символов";
	}
	else {			
            $your_old_password = $_POST['old_password']; // действующий, по мнению юзера, пароль
            $real_old_password_hash = queryMysql("SELECT password FROM user WHERE login='$current_user'"); // реально действ. хэш пароля который в базе
            $result_real_old_password_hash = $real_old_password_hash->fetch_array();
            $result_real_old_password_hash = $result_real_old_password_hash['password'];

        //если старый пароль совпал с хэшем
            if (password_verify("$your_old_password", "$result_real_old_password_hash")) {
                    echo "действующий пароль и хэш совпадают!";
                    $new_password = $_POST['new_password'];
                    $new_password = password_hash("$new_password", PASSWORD_DEFAULT); // хешируем пароль
                    // update pass	
                    queryMysql("UPDATE user SET password = '$new_password' WHERE login='$current_user'");
                    header('Location: user.php');

            }
            else {
                echo "Ошибка вы ввели не верный действующий пароль";
            }
	}
}

/* Get list of users */
function getMembersList() {
    if (checkAdmin()) {
        echo "<div align='center'>";
        $s = queryMysql("SELECT * FROM user ORDER by user_id"); // запрос с сортировкой по user_id

        // Выводим заголовок таблицы:
        echo "<table border='1' width='40%' bgcolor='yellow'>";
        echo "<tr><td><b>Login</b></td> <td><b>User ID</b></td> <td><b>Ban</b></td>";
        echo "</tr>";

        // Выводим таблицу:  , получаем число рядов в выборке
        for ($c=0; $c<$s->num_rows; $c++) {
            echo "<tr>";
            $f = $s->fetch_array();
            $banned = $f['ban'];
            if ($banned == '') {
                    $banned = "<a href='?ban=$f[user_id]'>Забанить</a>";
            } 
            else {$banned = "<a href='?unban=$f[user_id]'>Разбанить</a>";}

            echo "<td>$f[login]</td> <td>$f[user_id]</td><td>$banned</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    else {echo "Доступ запрещён";}
}

/* Upload userpic*/
if (isset($_POST['upload_userpic'])) {
    uploadUserPic();
}

function uploadUserPic(){
    $userdata = checkAuth();
    $current_user = $userdata['current_user'];
    if ($_FILES) {
        $name = $_FILES['filename']['name'];
        switch($_FILES['filename']['type']) {
            case 'image/jpeg':
                $ext = 'jpg';
                break;
            case 'image/gif':
                $ext = 'gif';
                break;
            case 'image/png':
                $ext = 'png';
                break;
            case 'image/tiff':
                $ext = 'tif';
                break;
            default:
                $ext = '';
                break;
        }
        if ($ext) {
          $userpic_full_path = "img/userpics/$current_user.$ext";
          move_uploaded_file($_FILES['filename']['tmp_name'], $userpic_full_path);
         // echo "Uploaded image '$name' as '$n':<br>";
         queryMysql("UPDATE user SET userpic = '$userpic_full_path' WHERE login = '$current_user'");
        }
        else {
            echo "$name is not an accepted image file";
        }
    }
    else { 
      echo "No image has been uploaded";
    }
}

if (isset($_POST['choise_userpic'])) {
    choiseUserPic();
}

function choiseUserPic() {
    if (isset($_POST['my_userpic'])) {
        $userdata = checkAuth();
        $current_user = $userdata['current_user'];
        $user_pic = $_POST['my_userpic'];

        $userpic_full_path = "img/userpics/$user_pic";
        queryMysql("UPDATE user SET userpic = '$userpic_full_path' WHERE login = '$current_user'");
    }
}

function getUserPic() {
   $s = queryMysql("SELECT userpic FROM user WHERE login = '$_SESSION[login]'");
   $f = $s->fetch_array();
   $path = "<a title='Смена аватара' href='upload_pic.php'><img class='avatar' width='150px' height='150px' src='$f[userpic]'></a>";
   return $path;
}

/* Info about current user */
function userInfo() {
    $userdata = checkAuth();
    $current_user = $userdata['current_user'];
    if (checkAdmin()) {
        $settings = "<td><a href='settings.php'>Settings</a></td>";
    } else {}
    
    echo "<div align='center'>";
    $s = queryMysql("SELECT * FROM user WHERE login='$current_user' ORDER BY user_id"); 

    // Выводим заголовок таблицы:
    echo "<table class='table'>";
    echo "<tr><td>Avatar</td><td>User ID</td><td>Login</td><td>Role</td><td>Last Login</td><td>Change pass</td><td>Settings</td>";
    echo "</tr>";
	
    // Выводим таблицу:  получаем число рядов в выборке , $c меньше кол-ва рядов в выборке ($s->num_rows).
    for ($c=0; $c<$s->num_rows; $c++) {
            echo "<tr>";
            $f = $s->fetch_array(); 
            $userpic = $f['userpic'];
            if ($userpic == ''){
                $userpic = "<a href='upload_pic.php'>Upload avatar</a>";
            } else {$userpic = getUserPic();}
            echo "<td>$userpic</td><td>$f[user_id]</td><td>$f[login]</td><td>$f[role]</td><td>$f[log]</td><td><a href='upd_pass.php'><img title='Смена пароля' src='img/pass.png'></a></td>$settings";
            echo "</tr>";
    }
    echo "</table>";
}

function shortUserInfo() {
    $userdata = checkAuth();
    $current_user = $userdata['current_user'];
    $client_ip = $userdata['client_ip'];
    // Sign out text
    $random_otvet = rand(1,5);
    switch ($random_otvet) {
        case 1:
                $random_logout_text = "Выйти проветриться";
                break;
        case 2:
                $random_logout_text = "Выйти из админки";
                break;
        case 3:
                $random_logout_text = "Разлогиниться";
                break;
        case 4:
                $random_logout_text = "Выход";
                break;
        case 5:
                $random_logout_text = "Logout";
                break;
        default:
                print "error";
    }
    $userpic = getUserPic();
    echo "$userpic<br><br> Вы вошли как <a title = 'Нажмите для подробной информации' href='user.php'>$current_user</a>, ваш IP <a target='blank' href='https://ip.osnova.news/?ip=$client_ip'>$client_ip</a>";
    echo "<br><a href='?sign_out'>$random_logout_text</a><br><br>";
}

function checkAdmin() {
    $userdata = checkAuth();
    $role = $userdata['role'];
    if ($role == "admin") {
        return true;
    } else {return false;}
}

/* Ban and unban user */
if (isset($_GET['ban']) or isset($_GET['unban'])) {
    if (checkAdmin()) {
       getBan();
    } else { header('Location: 404.php');}
}

function getBan() {
    if (isset($_GET['ban'])) {
        $user_id = $_GET['ban'];
        echo "$user_id<br>";
        if (queryMysql("UPDATE user SET ban = 'yes' WHERE user_id = '$user_id'")) {
            header('Location: members.php');
        }
    } else {}

    if (isset($_GET['unban'])) {
        $user_id = $_GET['unban'];
        if (queryMysql("UPDATE user SET ban = '' WHERE user_id = '$user_id'")) {
            header('Location: members.php');
        }
    } else {}
}

/* Site settings */

if (isset($_POST['upload_favicon'])) {
    uploadFavicon();
}

function uploadFavicon() {
    $userdata = checkAuth();
    $current_user = $userdata['current_user'];
    if ($_FILES) {
        $name = $_FILES['filename']['name'];
        switch($_FILES['filename']['type']) {
            case 'image/x-icon':
                $ext = 'ico';
                break;
            case 'image/png':
                $ext = 'png';
                break;
            default:           
                $ext = '';
                break;
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