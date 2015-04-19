<html>
	<head>
		<meta charset="UTF-8">
		<title>Форма авторизации</title>
	</head>
	<body>
		<form method="GET" action="avt.php">
			<h1>Форма авторизации</h1>
			<p>Введите вашу фамилию</p>
			<input type="text" name="avt_surname">
			<p>Введите ваше имя</p>
			<input type="text" name="avt_name"><br><br>
			<input type="submit" value="Войти" name="avt_ok">
			<input type="reset" value="Сброс">
		</form>

		<?php
				
				$avt_name = $_GET['avt_name'];
				$avt_surname = $_GET['avt_surname'];
				$avt_ok = $_GET['avt_ok'];
				
				
				$link = mysql_connect("localhost", "root", "1") or die(mysql_error());
				$db_connected = mysql_select_db("woolf", $link) or die(mysql_error());
				
				
				if(isset($avt_ok)){
					if(empty($avt_surname)||empty($avt_name)){
						echo "<b>Вы не заполнили одно или несколько полей</b><br>";
					}

					else{
						$flag = 0;
						$result = mysql_query("SELECT surname, name FROM users") or die(mysql_error());
						$row = mysql_fetch_array($result);
						
						while($row = mysql_fetch_array($result)){
								
								if($row['name'] == $avt_name && $row['surname'] == $avt_surname){
									echo "<b>ДОБРО ПОЖАЛОВАТЬ, $avt_name $avt_surname</b><br>";
									$flag = 1;
									break;
								}	
							}

						if($flag == 0){
							echo "Вы не найдены в базе зарегистрированных пользователей.";
							echo "<a href='reg.php'>Пройти регистрацию</a>";
						}

					}
				}


				
					
				
		?>



	</body>
</html>

