<?php 
session_start();
$main_page =$_SESSION['main_page'];

switch($main_page)
{
	case "0":
	case "1":

		$search_menu = $_POST['criterion'];
		$search_text = $_POST['searchText'];
		$db_host = "localhost"; 
		$db_user = "root"; // Логин БД
		$db_password = ""; // Пароль БД
		$db_base = 'company_devices'; // Имя БД
		$db_table = "user"; // Имя Таблицы БД
		$search_menu = $_POST['criterion'];   //переменная принимает значение из формы (выпадающий список) в search.php 
		$search_text = $_POST['searchText'];  //переменная принимает значение из формы (вводимый текст) в search.php
							
					// Подключение к базе данных
					$mysqli = new mysqli($db_host,$db_user,$db_password,$db_base);

					// Если есть ошибка соединения, выводим её и убиваем подключение
					if ($mysqli->connect_error)
						{
							die('Ошибка : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
						}


					echo " </br></br><h1 style='font-style:italic' align='center'>Результат поиска </h1><br/><br/><br/>";

						
										switch ($search_menu)   
										{
											case "SEngRoom":
											
																//запрос на поиск в БД связанных записей в соответствии с введеным текстом в форме
																$result_SEngRoom = mysqli_query($mysqli, "SELECT S.type_server,S.name_server, U.name_unit, R.name_rack, EG.name_eng_room FROM server S, unit U, rack R,engine_room EG WHERE S.id_unit=U.id_unit AND U.id_rack=R.id_rack AND R.id_eng_room =EG.id_eng_room AND EG.name_eng_room LIKE '$search_text'"); 

																$myrow_of_SEngRoom = mysqli_fetch_array($result_SEngRoom); // Запись полученного результата в массив
														
																
																echo "<table width='15%' border='1' align = 'center' class = 'table_dark'>";
																	// Названия столбцов
																	echo '<tr>
																	<td style="font-weight: bold;align :center; font-style:italic;color:red"> Машзал </td>
																	<td style="font-weight: bold;align :center; font-style:italic;color:red"> Стойка </td>
																	<td style="font-weight: bold;align :center; font-style:italic;color:red"> Юнит </td>
																	<td style="font-weight: bold;align :center ;font-style:italic;color:red"> Сервер </td>
																	<td style="font-weight: bold;align :center ;font-style:italic;color:red"> Тип сервера</td>
																  </tr>';
														// Построчное считывание

																	do
																	{
																		echo '<tr>'
																				.'<td align = "center">' .$myrow_of_SEngRoom['name_eng_room']. '</td>'
																				.'<td align = "center">'.$myrow_of_SEngRoom['name_rack'].'</td>'
																				.'<td align = "center">'.$myrow_of_SEngRoom['name_unit'].'</td>'
																				.'<td align = "center">'.$myrow_of_SEngRoom['name_server'].'</td>'
																				.'<td align = "center">'.$myrow_of_SEngRoom['type_server'].'</td>'
																			.'</tr>';
																	} 
																	while ($myrow_SEngRoom = mysqli_fetch_array($result_SEngRoom));

																echo "</table></br></br></br>";
											break;
											
											case "SRack":
																//запрос на поиск в БД связанных записей в соответствии с введеным текстом в форме																
																$result_SRack = mysqli_query($mysqli, "SELECT S.type_server,S.name_server, U.name_unit, R.name_rack, EG.name_eng_room FROM server S, unit U, rack R,engine_room EG WHERE S.id_unit=U.id_unit AND U.id_rack=R.id_rack AND R.id_eng_room =EG.id_eng_room AND R.name_rack LIKE '$search_text'"); 

																$myrow_of_SRack = mysqli_fetch_array($result_SRack); // Запись полученного результата в массив
						
																
																echo "<table width='15%' border='1' align = 'center' class = 'table_dark'>";
																	// Названия столбцов
																	echo '<tr>
																	<td style="font-weight: bold;align :center; font-style:italic;color:red"> Машзал </td>
																	<td style="font-weight: bold;align :center; font-style:italic;color:red"> Стойка </td>
																	<td style="font-weight: bold;align :center; font-style:italic;color:red"> Юнит </td>
																	<td style="font-weight: bold;align :center; font-style:italic;color:red"> Сервер </td>
																	<td style="font-weight: bold;align :center; font-style:italic;color:red"> Тип сервера</td>
																  </tr>';
														// Построчное считывание

																	do
																	{
																		echo '<tr>'
																				.'<td align = "center">' .$myrow_of_SRack['name_eng_room']. '</td>'
																				.'<td align = "center">'.$myrow_of_SRack['name_rack'].'</td>'
																				.'<td align = "center">'.$myrow_of_SRack['name_unit'].'</td>'
																				.'<td align = "center">'.$myrow_of_SRack['name_server'].'</td>'
																				.'<td align = "center">'.$myrow_of_SRack['type_server'].'</td>'
																			.'</tr>';
																	} 
																while ($myrow_SRack = mysqli_fetch_array($result_SRack));

																echo "</table></br></br></br>";
											break;
											
											case "SUnit":
											
																//запрос на поиск в БД связанных записей в соответствии с введеным текстом в форме
																$result_SUnit = mysqli_query($mysqli, "SELECT S.type_server,S.name_server, U.name_unit, R.name_rack, EG.name_eng_room FROM server S, unit U, rack R,engine_room EG WHERE S.id_unit=U.id_unit AND U.id_rack=R.id_rack AND R.id_eng_room =EG.id_eng_room AND U.name_unit LIKE '$search_text'"); 

																$myrow_of_SUnit = mysqli_fetch_array($result_SUnit); // Запись полученного результата в массив
																
																
																echo "<table width='15%' border='1' align = 'center' class = 'table_dark'>";
																	// Названия столбцов
																	echo '<tr>
																	<td style="font-weight: bold;align :center; font-style:italic;color:red"> Машзал </td>
																	<td style="font-weight: bold;align :center; font-style:italic;color:red"> Стойка </td>
																	<td style="font-weight: bold;align :center; font-style:italic;color:red"> Юнит </td>
																	<td style="font-weight: bold;align :center; font-style:italic;color:red"> Сервер </td>
																	<td style="font-weight: bold;align :center; font-style:italic;color:red"> Тип сервера</td>
																  </tr>';
														// Построчное считывание

																	do
																	{
																		echo '<tr>'
																				.'<td align = "center">' .$myrow_of_SUnit['name_eng_room']. '</td>'
																				.'<td align = "center">'.$myrow_of_SUnit['name_rack'].'</td>'
																				.'<td align = "center">'.$myrow_of_SUnit['name_unit'].'</td>'
																				.'<td align = "center">'.$myrow_of_SUnit['name_server'].'</td>'
																				.'<td align = "center">'.$myrow_of_SUnit['type_server'].'</td>'
																			.'</tr>';
																	} 
																while ($myrow_SUnit = mysqli_fetch_array($result_SUnit));

																echo "</table></br></br></br>";
											break;
											
											case "SNameServer":
											
																//запрос на поиск в БД связанных записей в соответствии с введеным текстом в форме
																$result_SNameServer = mysqli_query($mysqli, "SELECT S.type_server,S.name_server, U.name_unit, R.name_rack, EG.name_eng_room FROM server S, unit U, rack R,engine_room EG WHERE S.id_unit=U.id_unit AND U.id_rack=R.id_rack AND R.id_eng_room =EG.id_eng_room AND S.name_server LIKE '$search_text'"); 

																$myrow_of_SNameServer = mysqli_fetch_array($result_SNameServer); // Запись полученного результата в массив
														
																
																echo "<table width='15%' border='1' align = 'center' class = 'table_dark'>";
																	// Названия столбцов
																	echo '<tr>
																	<td style="font-weight: bold;align :center; font-style:italic;color:red"> Машзал </td>
																	<td style="font-weight: bold;align :center; font-style:italic;color:red"> Стойка </td>
																	<td style="font-weight: bold;align :center; font-style:italic;color:red"> Юнит </td>
																	<td style="font-weight: bold;align :center; font-style:italic;color:red"> Сервер </td>
																	<td style="font-weight: bold;align :center; font-style:italic;color:red"> Тип сервера</td>
																  </tr>';
														// Построчное считывание

																	do
																	{
																		echo '<tr>'
																				.'<td align = "center">' .$myrow_of_SNameServer['name_eng_room']. '</td>'
																				.'<td align = "center">'.$myrow_of_SNameServer['name_rack'].'</td>'
																				.'<td align = "center">'.$myrow_of_SNameServer['name_unit'].'</td>'
																				.'<td align = "center">'.$myrow_of_SNameServer['name_server'].'</td>'
																				.'<td align = "center">'.$myrow_of_SNameServer['type_server'].'</td>'
																			.'</tr>';
																	} 
																while ($myrow_SNameServer = mysqli_fetch_array($result_SNameServer));

																echo "</table></br></br></br>";								
											break;
											
											case "STypeServer":
																//запрос на поиск в БД связанных записей в соответствии с введеным текстом в форме
																$result_STypeServer = mysqli_query($mysqli, "SELECT S.type_server,S.name_server, U.name_unit, R.name_rack, EG.name_eng_room FROM server S, unit U, rack R,engine_room EG WHERE S.id_unit=U.id_unit AND U.id_rack=R.id_rack AND R.id_eng_room =EG.id_eng_room AND S.type_server LIKE '$search_text'"); 

																$myrow_of_STypeServer = mysqli_fetch_array($result_STypeServer); // Запись полученного результата в массив
																
																
																echo "<table width='15%' border='1' align = 'center' class = 'table_dark'>";
																	// Названия столбцов
																	echo '<tr>
																	<td style="font-weight: bold;align :center; font-style:italic;color:red"> Машзал </td>
																	<td style="font-weight: bold;align :center; font-style:italic;color:red"> Стойка </td>
																	<td style="font-weight: bold;align :center; font-style:italic;color:red"> Юнит </td>
																	<td style="font-weight: bold;align :center; font-style:italic;color:red"> Сервер </td>
																	<td style="font-weight: bold;align :center; font-style:italic;color:red"> Тип сервера</td>
																  </tr>';
														// Построчное считывание

																	do
																	{
																		echo '<tr>'
																				.'<td align = "center">' .$myrow_of_STypeServer['name_eng_room']. '</td>'
																				.'<td align = "center">'.$myrow_of_STypeServer['name_rack'].'</td>'
																				.'<td align = "center">'.$myrow_of_STypeServer['name_unit'].'</td>'
																				.'<td align = "center">'.$myrow_of_STypeServer['name_server'].'</td>'
																				.'<td align = "center">'.$myrow_of_STypeServer['type_server'].'</td>'
																			.'</tr>';
																	} 
																while ($myrow_STypeServer = mysqli_fetch_array($result_STypeServer));

																echo "</table></br></br></br>";
											break;
											
										}	
										
										echo '<p style="text-align: center;"><input type="submit" onclick=location.href="search.php" class="default_button" " value="Вернуться"></p>
											  <p style="text-align: center;"><input type="submit" onclick=location.href="check_session.php" class="default_button" " value="Главная"></p>'; 
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


<html><head><link href="cssforlastlab.css" rel="stylesheet" type="text/css"><head><body style="background-image: url('bg-9.png')"><body></body></html>