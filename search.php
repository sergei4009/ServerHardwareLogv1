<?php 
session_start();

$main_page =$_SESSION['main_page'];

switch($main_page)
{
	case "0":
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
					//запрос на выборку связанной записи из нескольких таблиц одновременно
					$result_of_log = mysqli_query($mysqli, "SELECT S.type_server,S.name_server, U.name_unit, R.name_rack, EG.name_eng_room FROM server S, unit U, rack R,engine_room EG WHERE S.id_unit=U.id_unit AND U.id_rack=R.id_rack AND R.id_eng_room =EG.id_eng_room ORDER BY type_server"); 

					$myrow_of_log = mysqli_fetch_array($result_of_log); // Запись полученного результата в массив
					
					
					echo " </br></br><h1 style='font-style:italic' align='center'>Актуальная БД</h1></br>";
					
					echo "<table width='15%' border='1' align = 'center' class = 'table_dark'>";
						// Названия столбцов
						echo '<tr>
								<td style="font-weight: bold;align :center ;font-style:italic;color:red"> Машзал </td>
								<td style="font-weight: bold;align :center ;font-style:italic;color:red"> Стойка </td>
								<td style="font-weight: bold;align :center ;font-style:italic;color:red"> Юнит </td>
								<td style="font-weight: bold;align :center ;font-style:italic;color:red"> Сервер </td>
								<td style="font-weight: bold;align :center ;font-style:italic;color:red"> Тип сервера</td>
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
					
					
					echo " <h1 style='font-style:italic' align='center'>Выберите из списка критерий поиска : </h1></br>";
					
					echo "<form action='outputSearch.php' method='post' align = 'center'>   //вывод формы поиска
					
								<select name='criterion' align = 'center'>
														<option value='SEngRoom'>Машзал</option>
														<option value='SRack'>Стойка</option>
														<option value='SUnit'>Юнит</option>
														<option value='SNameServer'>Название сервера</option>
														<option value='STypeServer'>Тип сервера</option>
								</select>
								
							<input required style='text-align:center' maxlength='25' size='40' name='searchText' placeholder='Введите критерий поиска' />	
							<input type='submit' name='send' value='Поиск' />
							
					</form>
					<br/>
					<br/>
					<br/>
					
					<form action='check_session.php' method='POST'>
					<p style='text-align: center;'><input type='submit' onclick='location.href='check_session.php'' value='Вернуться' class = 'default_button'></p>
					</form>";
	
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
<title>Поиск записи</title></head><body></body></html>