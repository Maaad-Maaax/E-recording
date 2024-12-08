	<?php
	include '/header.php';
	echo <<<HERE
	<div class="content">
		<h1>Записаться к врачу</h1>
		<form action="/bron.php" method="post">
			<p>Ваши ФИО: <input type="text" name="FIO" placeholder="Фамилия Имя Отчество" required></p>
			<p>Дата рождения: <input type="date" name="DateR" required></p>
			<p>Контактный телефон: <input type="text" name="kPhone" pattern="[0-9]{11}" placeholder="В формате: 89xxXXXxxXX" required></p>
			<p>Номер полиса: <input type="text" name="OMS" placeholder="XXXXxxxxXXXXxxxx" pattern="[0-9]{16}" required></p>
			<p>Фактический адрес проживания: <input type="text" name="adres" required></p>
HERE;
			echo "<p>Врач: <select name=\"id_doc\">";
					/* Соединяемся с базой данных */
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
			echo "</select></p>";
				?>
			<p>Выберите дату записи: <input type="date" name="DateZ">
   			<p><input type="submit" value="Отправить"></p>
		</form>
	</div>
</header>
<?php include '/footer.php';?>
</body>
</html>
