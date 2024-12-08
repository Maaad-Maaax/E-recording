<?php include '/header.php';?>
  <div class="content">
	<h1>Вы упешно записаны!</h1>
<?php
	$time_slot = $_POST['time_slot'];
	$FIO = $_POST['FIO'];
	$id_doc = $_POST['id_doc'];
	$DateZ = $_POST['DateZ'];
	$hostname = "localhost"; // название/путь сервера, с MySQL
	$username = "root"; // имя пользователя (в Denwer`е по умолчанию "root")
	$password = ""; // пароль пользователя (в Denwer`е по умолчанию пароль отсутствует, этот параметр можно оставить пустым)
	$dbName = "polyclinic"; // название базы данных
	$db = mysql_connect ($hostname,$username,$password) or die ("Немогусоздатьсоединение");
	mysql_select_db ("polyclinic", $db);
	/*Определение таблицы*/
	$connect = mysql_query("SELECT * FROM bron WHERE `ID врача` = '$id_doc' and `Дата` = '$DateZ'",$db);
	$myrow = mysql_fetch_array($connect);
	if ($id_doc == $myrow['ID врача'] and $DateZ == $myrow['Дата']) {
		mysql_query("UPDATE bron SET `$time_slot` = '$FIO' WHERE `ID врача` = '$id_doc' and `Дата` = '$DateZ'",$db);
	}
	  else {
	mysql_query("INSERT INTO bron (`ID врача`,`Дата`,`$time_slot`) VALUES ('$id_doc','$DateZ','$FIO')",$db);
	  }
		echo "<table>";
		echo "<tr><th>Дата записи</th><th>Время записи</th><th>Врач</th><th>Кабинет</th></tr>";
			echo "<tr>";
	  			$connecto = mysql_query("SELECT * FROM doctor WHERE `ID врача` = '$id_doc'",$db);
				$myrowo = mysql_fetch_array($connecto);
				echo "<td id=\"table_info\">".$DateZ."</td>";
				echo "<td id=\"table_info\">".$time_slot."</td>";
				echo "<td id=\"table_info\">".$myrowo['ФИО врача']."</td>";
				echo "<td id=\"table_info\">".$myrowo['Кабинет']."</td>";
			echo "</tr>";
		echo "<tr></tr>";
	echo "</table>";
?>
	</div>
</header>
<?php include '/footer.php';?>
</body>
</html>
