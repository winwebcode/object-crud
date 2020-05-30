<html>
<head>
	<title>Парсер валют с ЦБ</title>
	
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<div align="center">
	<h2>Данные</h2>
	
</div>



<?php
/*
https://regex101.com/ test regexp
*/

require_once "config.php";
$today = date("d.m.Y");
//парсим курсы за сегодня с ЦБ
$money_data = file_get_contents("http://cbr.ru/currency_base/daily/?UniDbQuery.Posted=True&UniDbQuery.To=$today");
file_put_contents('temp/money_cbr.html', $money_data);

//парсинг USD, не трогать пробелы, иначе всё навернётся
preg_match_all('!<td>Доллар США<\/td>
          <td>.*<\/td>
        <\/tr>!', $money_data, $usd_res);
		
preg_match_all('!<td>Евро<\/td>
          <td>.*<\/td>!', $money_data, $eur_res);
		
/*		//
for ($i = 0; $i < count($res[0]); $i++) {
   $usd_res[$i] = preg_replace("/[\s\n]/", "", $usd_res[$i]);
}
*/
$usd_res[0][0] = preg_replace("/[\s\n]/", "", $usd_res[0][0]);
$usd_value = $usd_res[0][0];

//echo round($usd_value, 2);

$eur_value = $eur_res[0][0];
echo "Курсы ЦБ РФ на сегодня:<br/>$usd_value<br/>$eur_value";

 ?>
 
 </body>
</html>