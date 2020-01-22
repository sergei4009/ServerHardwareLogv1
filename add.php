<?php 
session_start();
?>

<html><head><link href="cssforlastlab.css" rel="stylesheet" type="text/css"><meta charset="utf-8">
<title>Добавление записи</title></head><body style="background-image: url('bg-9.png')">
<body></body></html>

<?php

	$main_page =$_SESSION['main_page'];  
	switch($main_page)
	{
		case "0":   // если пользователь не обладает правами администратора,то не сможет получить доступ к данной странице
		
		echo ' </br></br><h1 style="font-style:italic" align="center">Внимание!</h1>
		</br></br><h1 style="font-style:italic" align="center">Доступ к данной странице открыт только пользователям с правами администратора</h1></br>";
		<p style="text-align: center;"><input type="submit" onclick=" location.href="check_session.php" " value="Вернуться" class = "default_button"></p>';
		
		break;
		
		case "1":
		$db_host = "localhost";
					$db_user = "root"; // Логин БД
					$db_password = ""; // Пароль БД
					$db_base = 'company_devices'; // Имя БД
					$db_table = "user"; // Имя Таблицы БД

					// Подключение к базе данных
					$mysqli = new mysqli($db_host,$db_user,$db_password,$db_base);

					// Если есть ошибка соединения, выводим её и убиваем подключение
					if ($mysqli->connect_error)
						{
							die('Ошибка : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
						}
						
					echo '<body style="background-image: url("bg-9.png")">
									<div id ="CenterBlock">
									</br></br><h1 style="font-style:italic" align="center">Добавление записи в БД </h1><br/><br/><br/>

									<form  action = "outputAdd.php" method="post" align = "center">

									<input required style="text-align:center" maxlength="25" size="40" name="field_EG" placeholder="Машзал" />
									<input required style="text-align:center" maxlength="25" size="40" name="field_R" placeholder="Стойка" />
									<input required style="text-align:center" maxlength="25" size="40" name="field_U" placeholder="Юнит" />
									<input required style="text-align:center" maxlength="25" size="40" name="field_name_server" placeholder="Название сервера" />
									<input required style="text-align:center" maxlength="25" size="40" name="field_type_server" placeholder="Тип сервера" />

									<p style="text-align: center;"><input type="submit" name="but_1" class="default_button" value="Добавить"/></p>		
									</form>
									
									<form action="check_session.php" method="POST">
										<p style="text-align: center;"><input type="submit" value="Вернуться" class = "default_button"></p>
									</form>
								</div>
							</body>
						</html>';
		
		
		break;
		
		default:
		
		echo ' </br></br><h1 style="font-style:italic" align="center">Внимание!</h1>
					</br></br><h1 style="font-style:italic" align="center">Доступ к данной странице открыт только авторизованным пользователям</h1></br>
					<form action="main.html" method="POST">
					<p style="text-align: center;"><input type="submit" value="Войти" class = "default_button"></p>
					</form>';
		break;
	}
	
?>