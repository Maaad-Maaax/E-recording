<?php include '/header.php';?>
  <div class="content">
	<h1>Выберите свободное время!</h1>
<?php
	$FIO = $_POST['FIO'];
	$DateR = $_POST['DateR'];
	$kPhone = $_POST['kPhone'];
	$OMS = $_POST['OMS'];
	$adres = $_POST['adres'];
	$id_doc = $_POST['id_doc'];
	$DateZ = $_POST['DateZ'];
	$hostname = "localhost"; // название/путь сервера, с MySQL
	$username = "root"; // имя пользователя (в Denwer`е по умолчанию "root")
	$password = ""; // пароль пользователя (в Denwer`е по умолчанию пароль отсутствует, этот параметр можно оставить пустым)
	$dbName = "polyclinic"; // название базы данных
	$db = mysql_connect ($hostname,$username,$password) or die ("Немогусоздатьсоединение");
	mysql_select_db ("polyclinic", $db);
	/*Определение таблицы*/
	$connect = mysql_query("SELECT * FROM bron",$db);
	$myrow = mysql_fetch_array($connect);
	mysql_query("INSERT INTO pacient (`ФИО пациента`,`Дата рождения`,`Телефон`,`Полис`,`Место жительства`) VALUES ('$FIO','$DateR','$kPhone','$OMS','$adres')",$db);
	$key_myrow = array_keys($myrow);
	echo "<table><tr><th>Время:</th><th>Запись</th></tr>";
	$i = 5;
	$connecto = mysql_query("SELECT * FROM bron WHERE `ID врача` = '$id_doc' and `Дата` = '$DateZ'",$db);
	$myrowo = mysql_fetch_array($connecto);
	do {
		if ($myrowo[$key_myrow[$i]] !== NULL) {
		$color = "style = \"background-color: yellow;\"";
		}
		else {
		$color = "style = \"background: #8EFF89;\"";
		}
		echo "<tr ".$color.">";
		echo "<td>$key_myrow[$i]</td>";
		echo "<td>";
				if ($myrowo[$key_myrow[$i]] !== NULL) {
				echo "Время занято!";
			}
		else {
			echo "<form action=\"/insert_bron.php\" method=\"post\">";
				echo "<input type=\"hidden\" name=\"id_doc\" value=\"".$id_doc."\">";
				echo "<input type=\"hidden\" name=\"DateZ\" value=\"".$DateZ."\">";
				echo "<input type=\"hidden\" name=\"time_slot\" value=\"".$key_myrow[$i]."\">";
				echo "<input type=\"hidden\" name=\"FIO\" value=\"".$FIO."\">";
				echo "<input type=\"submit\" value=\"Выбрать!\">";
			echo "</form>";
		}
		echo "</td>";
		echo "<tr>";
		$i = $i+2;
	}
	  while ($i<52);
	echo "</table>";
?>
	</div>
</header>
<?php include '/footer.php';?>
</body>
</html>
