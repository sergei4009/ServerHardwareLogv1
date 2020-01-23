<?php
session_start();

$main_page =$_SESSION['main_page'];
	switch($main_page)
	{
		case "0":
		
		echo " </br></br><h1 style='font-style:italic' align='center'>Внимание!</h1>";
		echo " </br></br><h1 style='font-style:italic' align='center'>Доступ к данной странице открыт только пользователям с правами администратора</h1></br>";
		echo '<form action="check_session.php" method="POST">
		<p style="text-align: center;"><input type="submit" value="Главная" class = "default_button"></p>
		</form>';
		
		break;
		case "1":
		
		$db_host = "localhost"; 
			$db_user = "root"; // Логин БД
			$db_password = ""; // Пароль БД
			$db_base = 'company_devices'; // Имя БД
			$db_table = "user"; // Имя Таблицы БД

			$edit_1_1 = $_POST['edit_1_1'];
			$edit_1_2 = $_POST['edit_1_2'];

			$edit_2_1 = $_POST['edit_2_1'];
			$edit_2_2 = $_POST['edit_2_2'];
			$edit_2_3 = $_POST['edit_2_3'];

			$edit_3_1 = $_POST['edit_3_1'];
			$edit_3_2 = $_POST['edit_3_2'];
			$edit_3_3 = $_POST['edit_3_3'];

			$edit_4_1 = $_POST['edit_4_1'];
			$edit_4_3 = $_POST['edit_4_3'];
			$edit_4_4 = $_POST['edit_4_4'];


					// Подключение к базе данных
					$mysqli = new mysqli($db_host,$db_user,$db_password,$db_base);

					// Если есть ошибка соединения, выводим её и убиваем подключение
					if ($mysqli->connect_error)
						{
							die('Ошибка : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
						}


					
					
					if (isset ($_POST['edit_this']))
						{
						
							switch($_POST['edit_this'])
							{
									case "1":
									
									$edit_query_1 = mysqli_query($mysqli, "DELETE FROM `engine_room` WHERE `id_eng_room`= '$edit_1_1' ");
						
											if ($edit_query_1)
												{
													echo ' </br></br><h1 style="font-style:italic" align="center">Запись успешно удалена!</h1></br></br></br>
													<p style="text-align: center;"><input type="submit" onclick=location.href="edit.php" class = "default_button" value="Вернуться"></p></br>';
												}
											else echo "Ошибка! <br/>";
									
									break;
									
									case "2":
									
									$edit_query_2 = mysqli_query($mysqli, "DELETE FROM `rack` WHERE `id_rack`= '$edit_2_1'");
						
											if ($edit_query_2)
												{
													echo ' </br></br><h1 style="font-style:italic" align="center">Запись успешно удалена!</h1></br></br></br>
													<p style="text-align: center;"><input type="submit" onclick=location.href="edit.php" class = "default_button" value="Вернуться"></p></br>';
												}
											else echo"Ошибка! <br/>";
									
									break;
									
									case "3":
											
									$edit_query_3 = mysqli_query($mysqli, "DELETE FROM `unit` WHERE `id_unit`= '$edit_3_1' ");
						
											if ($edit_query_3)
												{
													echo ' </br></br><h1 style="font-style:italic" align="center">Запись успешно удалена!</h1></br></br></br>
													<p style="text-align: center;"><input type="submit" onclick=location.href="edit.php" class = "default_button" value="Вернуться"></p></br>';
												}
											else echo"Ошибка! <br/>"; 
									
									break;
									
									case "4":
									
									$edit_query_4 = mysqli_query($mysqli, "DELETE FROM `server` WHERE `id_server`= '$edit_4_1' ");
						
											if ($edit_query_4)
												{
													echo ' </br></br><h1 style="font-style:italic" align="center">Запись успешно удалена!</h1></br></br></br>
													<p style="text-align: center;"><input type="submit" onclick=location.href="edit.php" class = "default_button" value="Вернуться"></p></br>';
												}
											else echo "Ошибка! <br/>";
									
									break;
							}
						
						}
					else 
					{
						echo " </br></br><h1 style='font-style:italic' align='center'>Ошибка! Не выделен ни один из чекбоксов!</h1></br></br></br>";
						echo '<p style="text-align: center;"><input type="submit" onclick=location.href="delete.php" value="Вернуться" class = "default_button"></p>';
					}	
		
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

<html><head><link href="cssforlastlab.css" rel="stylesheet" type="text/css"><head><body style="background-image: url('bg-9.png')">
