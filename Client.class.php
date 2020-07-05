<?php
require_once "config.php";

/* Work with clients */

/* Get list of clients company */
function getClientsList() {
    $resultat = queryMysql("SELECT * FROM klient ORDER by id_klient"); // запрос с сортировкой по id_klient
    if ($resultat->num_rows != 0) {	
        // Выводим заголовок таблицы:
        echo "<div align='center'>";
        echo "<table border='1' width='40%' bgcolor='yellow'>";
        echo "<tr><td><b>ID</b></td><td><b>Фамилия</b></td><td><b>Имя</b></td><td><b>Отчество</b></td><td><b>Дата рождения</b></td><td><b>Телефон</b></td><td><b>Редактирование</b></td>";
        echo "</tr>";

        // Выводим таблицу:  , получаем число рядов в выборке
        for ($c=0; $c<$resultat->num_rows; $c++) {
                echo "<tr>";
                $f = $resultat->fetch_array(); 
                echo "<td>$f[id_klient]</td> <td>$f[family]</td> <td>$f[name]</td> <td>$f[patronymic]</td> <td>$f[birth_date]</td> <td>$f[phone]</td><td><a href='update.php?id_klient=$f[id_klient]'>Редактировать</a></td>";
                echo "</tr>";
        }
        echo "</table><br><br>";
    }
    else {
        echo "<div align='center'>Клиенты не найдены</div>";
    }
}

/* Delete client of company by ID */
if (isset($_POST['nomerID'])) {
    deleteClient($drop_id);
}

function deleteClient($drop_id) {
    // Удаление данных из БД klient
    $drop_id = $_POST['nomerID'];
    if (queryMysql("delete from klient where (id_klient='$drop_id')") == true) {
        header('Location: getklientlist.php');
    } else {}
}

/* Mass delete */
if (isset($_POST['clear_bd'])) {
    massDeleteClients();
}

function massDeleteClients() {
    // Удаление данных из БД klient
    if (queryMysql("delete from klient where id_klient>='30')") == true) {
        echo "<br><strong>Клиенты с ID больше 30 удалены</strong>";
        //header('Location: getklientlist.php');
    } else {}
}

/* Add client */
if (isset($_POST['add_client'])) {
    addClient();
}

function addClient() {
    // Проверка полей на пустоту , избавляет от отправки пустой формы.
    if (!isset($_POST['family']) ||
        !isset($_POST['name']) ||
        !isset($_POST['birth_date']) ||
        !isset($_POST['phone']) ||
        !isset($_POST['patronymic'])) {
        echo "Не все поля заполнены";
    } 
    else {
        $family = $_POST['family'];
        $name = $_POST['name'];
        $birth_date = $_POST['birth_date'];
        $phone = $_POST['phone'];
        $patronymic = $_POST['patronymic']; 
        // ввод в таблицу клиент
        if (queryMysql("INSERT INTO klient (family, name, birth_date, phone, patronymic) VALUES ('$family', '$name', '$birth_date', '$phone','$patronymic')")) {
            header('Location: getklientlist.php');
        }
        else {
            echo "Ошибка при вставке данных";
        }
    }
}

/* Search client*/ 
if (isset($_GET['poisk']))	{
    searchByFamily();
} 


function searchByFamily(){
    $family = $_GET['poisk'];
    // Поиск с выборкой заданой в поле poisk
    $resultat = queryMysql("SELECT * FROM klient where family LIKE '%$family%'");

    //Если в таблике больше 0 записей, удовлетворяющих выборке то
    if ($resultat->num_rows != 0) {
        // Выводим заголовок таблицы:
        echo "<div align='center'>";
        echo "<table border='1' width='40%' bgcolor='yellow'>";
        echo "<tr><td><b>ID</b></td><td><b>Фамилия</b></td><td><b>Имя</b></td><td><b>Отчество</b></td><td><b>Дата рождения</b></td><td><b>Телефон</b></td> <td><b>Редактирование</b></td>";
        echo "</tr>";
        // Выводим таблицу:
        for ($c=0; $c<$resultat->num_rows; $c++) {
            echo "<tr>";
            $f = $resultat->fetch_array();
            echo "<td>$f[id_klient]</td> <td>$f[family]</td> <td>$f[name]</td> <td>$f[patronymic]</td> <td>$f[birth_date]</td> <td>$f[phone]</td><td><a href='update.php?id_klient=$f[id_klient]'>Редактировать</a></td>";
            echo "</tr>";
        }
        //Конец таблицы
        echo "</table> </div><br>";

    }
    else {
        echo "<div align='center'>Клиенты не найдены</div>";
    }
}
if (isset($_GET['change_data_client']))	{
    changeDataClient();
} 


function changeDataClient(){
    if (!isset($_GET['family']) ||
    !isset($_GET['name']) ||
    !isset($_GET['birth_date']) ||
    !isset($_GET['phone']) ||
    !isset($_GET['patronymic']) ||
    !isset($_GET['id_klient'])) {
        echo "Поля не заполнены";
    } 
    else {
        $family = $_GET['family'];
        $name = $_GET['name'];
        $birth_date = $_GET['birth_date'];
        $phone = $_GET['phone'];
        $patronymic = $_GET['patronymic'];
        $id = $_GET['id_klient'];

        // update
        if (queryMysql("UPDATE klient SET family = '$family' , name = '$name', patronymic='$patronymic', birth_date = '$birth_date', phone = '$phone' WHERE id_klient = '$id'") == true) {
            //echo "<div align='center'>Успех</div><br>";
            header('Location: getklientlist.php');
        }
        else {
            echo "Ошибка";
        }
    }
}

