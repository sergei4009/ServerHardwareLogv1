<?php
session_start();

	$main_page =$_SESSION['main_page'];
	switch($main_page)
	{
		case "0":
		
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
					
					$field_EG = $_POST['field_EG'];
					$field_R = $_POST['field_R'];
					$field_U = $_POST['field_U'];
					$field_name_server = $_POST['field_name_server'];
					$field_type_server = $_POST['field_type_server'];
					
					// Подключение к базе данных
					$mysqli = new mysqli($db_host,$db_user,$db_password,$db_base);

					// Если есть ошибка соединения, выводим её и убиваем подключение
					if ($mysqli->connect_error)
						{
							die('Ошибка : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
						}		
					
					$query_1 = mysqli_query($mysqli, "INSERT INTO `engine_room`(`name_eng_room`) VALUES ('$field_EG')"); 
					$query_take_last_id = mysqli_query($mysqli, "SELECT LAST_INSERT_ID()"); 
					$last_id_array_1 = mysqli_fetch_array($query_take_last_id);		
					
					$query_2 = mysqli_query($mysqli, "INSERT INTO `rack`(`id_eng_room`,`name_rack`) VALUES ('$last_id_array_1[0]','$field_R')"); 
					$query_take_last_id = mysqli_query($mysqli, "SELECT LAST_INSERT_ID()"); 
					$last_id_array_2 = mysqli_fetch_array($query_take_last_id);	
					
					$query_3 = mysqli_query($mysqli, "INSERT INTO `unit`(`id_rack`,`name_unit`) VALUES ('$last_id_array_2[0]','$field_U')"); 
					$query_take_last_id = mysqli_query($mysqli, "SELECT LAST_INSERT_ID()");
					$last_id_array_3 = mysqli_fetch_array($query_take_last_id);
					
					$query_4 = mysqli_query($mysqli, "INSERT INTO `server`(`id_unit`,`name_server`,`type_server`) VALUES ('$last_id_array_3[0]','$field_name_server','$field_type_server')");
			
					if ($query_1 || $query_2 || query_3 || query_4)
					{
						echo "</br></br><h1 style='font-style:italic' align='center'>Запись успешно добавлена</h1</p><br/>";
						echo '<p style="text-align: center;"><input type="submit" onclick=location.href="add.php" value="Вернуться" class = "default_button"></p>
						      <p style="text-align: center;"><input type="submit" onclick=location.href="check_session.php" class="default_button" value="Главная"><br/></p>';
					}
					else echo "Not OK";
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
<html><head><link href="cssforlastlab.css" rel="stylesheet" type="text/css"><head><body style="background-image: url('bg-9.png')"></body></html>

