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
		
		// Параметры для подключения
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
					
		echo'<form action="check_session.php" method="POST"> <p style="text-align: center;"><input type="submit" value="Главная" class = "default_button"></p>
			</form>';
					
					$result_of_log = mysqli_query($mysqli, "SELECT * FROM engine_room"); 

					$myrow_of_log = mysqli_fetch_array($result_of_log); // Запись полученного результата в массив
					
									echo '<h1 align="center"> Таблица: engine_room </h1></br>';
					
									echo "<table width='15%' border='1' align = 'center' class = 'table_dark'>";
										// Названия столбцов
										echo '<tr>
												<td style="font-weight: bold;align :center; font-style:italic;color:red">ID записи</td>
												<td style="font-weight: bold;align :center; font-style:italic;color:red">Название машзала</td>
											  </tr>';
									// Построчное считывание

									do
									{
										echo '<tr>'
												.'<td style="font-weight: bold;align :center;color:red">'.$myrow_of_log['id_eng_room'].'</td>'
												.'<td>'.$myrow_of_log['name_eng_room'].'</td>'
											.'</tr>';
									} 
									while ($myrow_of_log = mysqli_fetch_array($result_of_log));

									echo "</table></br>";

					
					echo '<form action = "outputDelete.php" method="post" align = "center">
																	<input type="checkbox" name="edit_this" value="1"/>Таблица «engine_room»<br>
																	<input required maxlength="25" size="40" name="edit_1_1" placeholder="ID_записи" />						
																	<input type="submit" name="but_1" value="Удалить"/>
																	<br/><br/><br/>
							
						</form>';
	
					$result_of_log = mysqli_query($mysqli, "SELECT* FROM rack"); 
					$myrow_of_log = mysqli_fetch_array($result_of_log); // Запись полученного результата в массив
					
					
					$tableName_query=$mysqli->query("SHOW TABLES FROM company_devices");
					$tableName = mysqli_fetch_row($tableName_query);
					
					echo '<h1 align="center"> Таблица: rack</h1></br>';

					
					echo "<table width='15%' border='1' align = 'center' class = 'table_dark'>";
						// Названия столбцов
						echo '<tr>
								<td style="font-weight: bold;align :center; font-style:italic;color:red">ID Машзала</td>
								<td style="font-weight: bold;align :center; font-style:italic;color:red">ID записи</td>
								<td style="font-weight: bold;align :center; font-style:italic;color:red">Имя стойки</td>
							  </tr>';
					// Построчное считывание

					do{
						echo '<tr>'
								.'<td style="font-weight: bold;align :center;color:red">'.$myrow_of_log['id_eng_room'].'</td>'
								.'<td>'.$myrow_of_log['id_rack'].'</td>'
								.'<td>'.$myrow_of_log['name_rack'].'</td>'
							.'</tr>';
					} 
					while ($myrow_of_log = mysqli_fetch_array($result_of_log));

					echo "</table></br>";
					
					echo '<form action = "outputDelete.php" method="post" align = "center">
																	<input type="checkbox" name="edit_this" value="2"/>Редактирование таблицы «rack»<br>
																	<input required maxlength="25" size="40" name="edit_2_1" placeholder="ID_записи" />						
																	<input type="submit" name="but_1" value="Удалить"/>
																	<br/><br/><br/>
	
						</form>';


					$result_of_log = mysqli_query($mysqli, "SELECT* FROM unit"); 
					$myrow_of_log = mysqli_fetch_array($result_of_log); // Запись полученного результата в массив
					
					
					$tableName_query=$mysqli->query("SHOW TABLES FROM company_devices");
					$tableName = mysqli_fetch_row($tableName_query);
					
					echo '<h1 align="center"> Таблица: unit</h1></br>';

					
					echo "<table width='15%' border='1' align = 'center' class = 'table_dark'>";
						// Названия столбцов
						echo '<tr>
								<td style="font-weight: bold;align :center; font-style:italic;color:red">ID стойки</td>
								<td style="font-weight: bold;align :center; font-style:italic;color:red">ID записи</td>
								<td style="font-weight: bold;align :center; font-style:italic;color:red">Название юнита</td>
							  </tr>';
					// Построчное считывание

					do{
						echo '<tr>'
								.'<td style="font-weight: bold;align :center;color:red">'.$myrow_of_log['id_rack'].'</td>'
								.'<td>'.$myrow_of_log['id_unit'].'</td>'
								.'<td>'.$myrow_of_log['name_unit'].'</td>'
							.'</tr>';
					} 
					while ($myrow_of_log = mysqli_fetch_array($result_of_log));

					echo "</table></br>";
					
					echo '<form action = "outputDelete.php" method="post" align = "center">
																	<input type="checkbox" name="edit_this" value="3"/>Редактирование таблицы «unit»<br>
																	<input required maxlength="25" size="40" name="edit_3_1" placeholder="ID_записи" />	
																	<input type="submit" name="but_1" value="Удалить"/>
																	<br/><br/><br/>
	
					</form>';
				
					$result_of_log = mysqli_query($mysqli, "SELECT* FROM server"); 
					$myrow_of_log = mysqli_fetch_array($result_of_log); // Запись полученного результата в массив
					
					echo '<h1 align="center"> Таблица: server</h1></br>';

					
					echo "<table width='15%' border='1' align = 'center' class = 'table_dark'>";
						// Названия столбцов
						echo '<tr>
								<td style="font-weight: bold;align :center; font-style:italic;color:red">ID юнита</td>
								<td style="font-weight: bold;align :center; font-style:italic;color:red">ID записи</td>
								<td style="font-weight: bold;align :center; font-style:italic;color:red">Имя сервера</td>
								<td style="font-weight: bold;align :center; font-style:italic;color:red">Тип сервера</td>
							  </tr>';
					// Построчное считывание

					do{
						echo '<tr>'
								.'<td style="font-weight: bold;align :center;color:red">'.$myrow_of_log['id_unit'].'</td>'
								.'<td>'.$myrow_of_log['id_server'].'</td>'
								.'<td>'.$myrow_of_log['name_server'].'</td>'
								.'<td>'.$myrow_of_log['type_server'].'</td>'

							.'</tr>';
					} 
					while ($myrow_of_log = mysqli_fetch_array($result_of_log));

					echo "</table></br>";
				
				echo '<form action = "outputDelete.php" method="post" align = "center">
																	<input type="checkbox" name="edit_this" value="4"/> Редактирование таблицы «server»<br>
																	<input required maxlength="25" size="40" name="edit_4_1" placeholder="ID записи" />							
																	<input type="submit" name="but_1" value="Удалить"/>
																	<br/><br/><br/>
	
				</form>';
		
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

<html><head><link href="cssforlastlab.css" rel="stylesheet" type="text/css"><body style="background-image: url('bg-9.png')">
<meta charset="utf-8">
<title>Удаление строк</title></head><body></body></html>
