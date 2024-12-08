<?php include '/header.php';?>
  <div class="content">
	<h1>Врачи!</h1>
<?php
	$hostname = "localhost"; // название/путь сервера, с MySQL
	$username = "root"; // имя пользователя (в Denwer`е по умолчанию "root")
	$password = ""; // пароль пользователя (в Denwer`е по умолчанию пароль отсутствует, этот параметр можно оставить пустым)
	$dbName = "polyclinic"; // название базы данных
	$db = mysql_connect ($hostname,$username,$password) or die ("Немогусоздатьсоединение");
	mysql_select_db ("polyclinic", $db);
	$connect = mysql_query("SELECT * FROM doctor",$db);
	$myrow = mysql_fetch_array($connect);
	echo "<table>";
		echo "<tr><th>ФИО врача</th><th>Специализация</th><th>Кабинет</th></tr>";
		do {
	  	echo "<tr><td>".$myrow['ФИО врача']."</td><td>".$myrow['Специализация']."</td><td>".$myrow['Кабинет']."</td></tr>";
		}
	  while ($myrow = mysql_fetch_array($connect));
	echo "</table>";
?>
	</div>
</header>
<?php include '/footer.php';?>
</body>
</html>

