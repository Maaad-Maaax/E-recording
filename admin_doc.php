<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Документ без названия</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="index_admin">
  <h2>Выберете учетную запись</h2>
  <form action="/doctor.php" method="post">
	<p>ФИО врача: <select name="id_doc">
				<?php			
					$hostname = "localhost"; // название/путь сервера, с MySQL
					$username = "root"; // имя пользователя (в Denwer`е по умолчанию "root")
					$password = ""; // пароль пользователя (в Denwer`е по умолчанию пароль отсутствует, этот параметр можно оставить пустым)
					$dbName = "polyclinic"; // название базы данных
					$db = mysql_connect ($hostname,$username,$password) or die ("Немогусоздатьсоединение");
					mysql_select_db ("polyclinic", $db);
					/*Определение таблицы*/
					$connect = mysql_query("SELECT * FROM doctor",$db);
					$myrow = mysql_fetch_array($connect);
					do {
						echo "<option value=\"".$myrow['ID врача']."\">".$myrow['ФИО врача']."</option>";
					}
					while ($myrow = mysql_fetch_array($connect));
				?>
			</select></p>
	<p>Пароль: <input type="password" name="password"></p>
	<p><input type="submit"></p>
  </form>
</div>
</body>
</html>
