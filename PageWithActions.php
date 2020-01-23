<?php 
session_start();

$main_page = $_SESSION['main_page'];    //  передача переменной значения главной страницы,установленной для авторизованного пользователя :1 - админ-панель ;0 - обычная страница

switch($main_page)
{
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
					
					//запрос на выборку связанной записи из нескольких таблиц одновременно
					$result_of_log = mysqli_query($mysqli, "SELECT S.type_server,S.name_server, U.name_unit, R.name_rack, EG.name_eng_room FROM server S, unit U, rack R,engine_room EG WHERE S.id_unit=U.id_unit AND U.id_rack=R.id_rack AND R.id_eng_room =EG.id_eng_room ORDER BY type_server"); 

					$myrow_of_log = mysqli_fetch_array($result_of_log); // Запись полученного результата в массив
					
					//вывод таблицы с полученными записями из запроса в $result_of_log
					echo " </br></br><h1 style='font-style:italic' align='center'>Актуальная БД </h1></br>";
					
					echo "<table width='15%' border='1' align = 'center' class = 'table_dark'>";
						// Названия столбцов
						echo '<tr>
								<td style="font-weight: bold;align :center; font-style:italic;color:red">Машзал</td>
								<td style="font-weight: bold;align :center; font-style:italic;color:red">Стойка</td>
								<td style="font-weight: bold;align :center; font-style:italic;color:red">Юнит</td>
								<td style="font-weight: bold;align :center; font-style:italic;color:red">Сервер</td>
								<td style="font-weight: bold;align :center; font-style:italic;color:red">Тип сервера</td>
							  </tr>';
					// Построчное считывание

					do{
						echo '<tr>'
								.'<td align = "center">' .$myrow_of_log['name_eng_room']. '</td>'
								.'<td align = "center">'.$myrow_of_log['name_rack'].'</td>'
								.'<td align = "center">'.$myrow_of_log['name_unit'].'</td>'
								.'<td align = "center">'.$myrow_of_log['name_server'].'</td>'
								.'<td align = "center">'.$myrow_of_log['type_server'].'</td>'
							.'</tr>';
					} 
					while ($myrow_of_log = mysqli_fetch_array($result_of_log));

					echo "</table></br></br></br>";
					
					echo "<h1 style='font-style:italic' align='center'> Вам доступны следующие действия </h1></br>";	
					
					echo "<table align = 'center'>";
					echo '<tr>
								<td align = "center" style="font-weight: bold;align :center"> <input type="submit" onclick=location.href="search.php" class="default_button" value="Поиск по БД"></td>
						 </tr>';
						 
					echo '<tr>
								<td align = "center" style="font-weight: bold;align :center"> <input type="submit" onclick=location.href="add.php" class="default_button" value="Добавление строк"></td>								
						</tr>';
					
					echo '<tr>
								<td align = "center" style="font-weight: bold;align :center"> <input type="submit" onclick=location.href="edit.php" class="default_button" value="Изменение строк"></td>
						</tr>';
					
					echo '<tr>
								<td align = "center" style="font-weight: bold;align :center"> <input type="submit" onclick=location.href="delete.php" class="default_button" value="Удаление строк"></td>
						</tr>';
						
					echo "</table></br></br></br>";
					
					echo "<table align = 'center'>";
						
					echo '<tr>
								<td align = "center" style="font-weight: bold;align :center"> <input type="submit" class = "default_button" onclick=location.href="exit_session.php" value="Войти под другой учетной записью"></td>
						</tr>';
					echo "</table></br></br></br>";
	
	break;
	
	case "0":
	
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
					
					//запрос на выборку связанной записи из нескольких таблиц одновременно
					$result_of_log = mysqli_query($mysqli, "SELECT S.type_server,S.name_server, U.name_unit, R.name_rack, EG.name_eng_room FROM server S, unit U, rack R,engine_room EG WHERE S.id_unit=U.id_unit AND U.id_rack=R.id_rack AND R.id_eng_room =EG.id_eng_room ORDER BY type_server"); 

					$myrow_of_log = mysqli_fetch_array($result_of_log); // Запись полученного результата в массив
					
					//вывод таблицы с полученными записями из запроса в $result_of_log
					echo " </br></br><h1 style='font-style:italic' align='center'>Актуальная БД </h1></br>";
					
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

					do{
						echo '<tr>'
								.'<td align = "center">'.$myrow_of_log['name_eng_room']. '</td>'
								.'<td align = "center">'.$myrow_of_log['name_rack'].'</td>'
								.'<td align = "center">'.$myrow_of_log['name_unit'].'</td>'
								.'<td align = "center">'.$myrow_of_log['name_server'].'</td>'
								.'<td align = "center">'.$myrow_of_log['type_server'].'</td>'
							.'</tr>';
					} 
					while ($myrow_of_log = mysqli_fetch_array($result_of_log));

					echo "</table></br></br></br>";
					
					echo "<h1 style='font-style:italic' align='center'> Вам доступны следующие действия </h1></br>";					
					echo '<p style="text-align: center;"><input type="submit" onclick=location.href="search.php" class="default_button" value="Поиск по БД"></p>
					<p style="text-align: center;"><input type="submit" onclick=location.href="exit_session.php" class="default_button" value="Войти под другой учетной записью"></p>';

	
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
<title>Список действий</title></head><body></body></html>