<html>
	<head>
		<meta charset="UTF-8">
		<title>Форма регистрации</title>
	</head>
	<body>
		<form method="POST" action="reg.php">
			<h1>Форма регистрации</h1>
			<p>Введите фамилию</p>
			<input type="text" name="surname">
			<p>Введите имя</p>
			<input type="text" name="name">
			<p>Введите номер телефона</p>
			<input type="text" name="tel"><br><br>
			<input type="submit" value="Зарегистрироваться" name="reg_ok">
		</form>


		<?php
			
				$name = $_POST['name'];//Регистрация с проверкой на заполненость полей и уникальным № телефона
				$surname = $_POST['surname'];
				$tel = $_POST['tel'];
				$reg_ok = $_POST['reg_ok'];
				$flag = 0;
				$link = mysql_connect("localhost", "root", "1") or die(mysql_error());
				$db_connected = mysql_select_db("woolf", $link) or die(mysql_error());
				
				
				
					if(empty($surname)||empty($name)||empty($tel)){
						echo "<b>Вы не заполнили одно или несколько полей</b><br>";
					}
					else{
						$result = mysql_query("SELECT tel FROM users");
						$row = mysql_fetch_array($result);
						while($row = mysql_fetch_array($result)){
							if($tel == $row["tel"]){
								$flag = 1;
								echo "<b>Пользователь с таким номером телефона уже зарегистрирован</b><br>";
								break;
							}
						}


						if($flag == 0){
							$result = mysql_query("INSERT INTO users (surname, name, tel) VALUES ('$surname', '$name', '$tel')") or die(mysql_error());
							echo "<h2>$name $surname, вы успешно прошли регистрацию</h2>";
						}
					}	
								
					$result = mysql_query("SELECT * FROM users");
					$row = mysql_fetch_array($result);
					do{
						printf("id: %s, Фамилия: %s, имя: %s, № телефона: %s<br>", $row["id"], $row["surname"], $row["name"], $row["tel"]);
					}
					while($row = mysql_fetch_array($result))
				
				
		?>



	</body>
</html>

