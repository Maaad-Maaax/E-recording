<?php
$id_doc = $_POST['id_doc'];
$passwor = $_POST['password'];
$hostname = "localhost"; // название/путь сервера, с MySQL
$username = "root"; // имя пользователя (в Denwer`е по умолчанию "root")
$password = ""; // пароль пользователя (в Denwer`е по умолчанию пароль отсутствует, этот параметр можно оставить пустым)
$dbName = "polyclinic"; // название базы данных
$db = mysql_connect ($hostname,$username,$password) or die ("Немогусоздатьсоединение");
mysql_select_db ("polyclinic", $db);
/*Определение таблицы*/
$connect = mysql_query("SELECT * FROM doctor_password WHERE `ID врача` = '$id_doc'",$db);
$myrow = mysql_fetch_array($connect);
if ($myrow['Пароль'] == $passwor) {
echo <<<HERE
	<!doctype html>
	<html>
	<head>
	<meta charset="utf-8">
	<title>Документ без названия</title>
	<link href="style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div class="cont">
HERE;
	$connectN = mysql_query("SELECT * FROM doctor WHERE `ID врача` = '$id_doc'",$db);
	$myrowN = mysql_fetch_array($connectN);
	echo "<h3>Страница посещений доктора: ".$myrowN['ФИО врача']."</h3>";
	echo <<<HERE
<table>
				<tr><th>Дата:</th><th>8:00 - 8:20</th><th>8:20 - 8:40</th><th>8:40 - 9:00</th><th>9:00 - 9:20</th><th>9:20 - 9:40</th><th>9:40 - 10:00</th><th>10:00 - 10:20</th><th>10:20 - 10:40</th><th>10:40 - 11:00</th><th>11:00 - 11:20</th><th>11:20 - 11:40</th><th>11:40 - 12:00</th><th>13:00 - 13:20</th><th>13:20 - 13:40</th><th>13:40 - 14:00</th><th>14:00 - 14:20</th><th>14:20 - 14:40</th><th>14:40 - 15:00</th><th>15:00 - 15:20</th><th>15:20 - 15:40</th><th>15:40 - 16:00</th><th>16:00 - 16:20</th><th>16:20 - 16:40</th><th>16:40 - 17:00</th></tr>		
HERE;
		$connectZ = mysql_query("SELECT * FROM bron WHERE `ID врача` = '$id_doc'",$db);
		$myrowZ = mysql_fetch_array($connectZ);
	do {
echo "<tr><td>".$myrowZ['Дата']."</td><td>".$myrowZ['8:00 - 8:20']."</td><td>".$myrowZ['8:20 - 8:40']."</td><td>".$myrowZ['8:40 - 9:00']."</td><td>".$myrowZ['9:00 - 9:20']."</td><td>".$myrowZ['9:20 - 9:40']."</td><td>".$myrowZ['9:40 - 10:00']."</td><td>".$myrowZ['10:00 - 10:20']."</td><td>".$myrowZ['10:20 - 10:40']."</td><td>".$myrowZ['10:40 - 11:00']."</td><td>".$myrowZ['11:00 - 11:20']."</td><td>".$myrowZ['11:20 - 11:40']."</td><td>".$myrowZ['11:40 - 12:00']."</td><td>".$myrowZ['13:00 - 13:20']."</td><td>".$myrowZ['13:20 - 13:40']."</td><td>".$myrowZ['13:40 - 14:00']."</td><td>".$myrowZ['14:00 - 14:20']."</td><td>".$myrowZ['14:20 - 14:40']."</td><td>".$myrowZ['14:40 - 15:00']."</td><td>".$myrowZ['15:00 - 15:20']."</td><td>".$myrowZ['15:20 - 15:40']."</td><td>".$myrowZ['15:40 - 16:00']."</td><td>".$myrowZ['16:00 - 16:20']."</td><td>".$myrowZ['16:20 - 16:40']."</td><td>".$myrowZ['16:40 - 17:00']."</td></tr>";
	}
	while($myrowZ = mysql_fetch_array($connectZ));	
echo <<<HERE
			</table>	
	</div>
	</body>
	</html>
HERE;
}
else {
	echo "<h2 style=\"text-align: center; margin-top: 100px;\">Пароль введен не верно!</h2>";
}
?>