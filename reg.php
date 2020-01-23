<?
session_start();
$main_page =$_SESSION['main_page'];   //присваивание переменной значения,которое определит,авторизован ли пользователь - если нет,то продолжит регистрацию (так как значение в main_page устанавливается только при авторизации)

	switch($main_page)      
	{
		case "0":
		case "1":
		
		echo " </br></br><h1 style='font-style:italic' align='center'>Внимание!</h1>";
		echo " </br></br><h1 style='font-style:italic' align='center'>Вы уже авторизованы - выйдите из аккаунта для регистрации </h1></br>";
		echo '<p style="text-align: center;"><input type="submit" onclick=location.href="main.html" value="Вернуться" class = "default_button"></p>';

		break;
		
		default:
									
		// Переменные с формы
		$login = $_POST['login'];
		$pass1 = $_POST['password'];
		$pass2 = $_POST['password1'];
		$admin = $_POST['admin'];
		
				if ($pass1 == $pass2)          //проверка совпадения паролей,введенных при регистрации
						{	
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
							
								$result = $mysqli->query("INSERT INTO user (user_login,user_password,admin_rules) VALUES ('$login','$pass1','$admin')");  //запрос для внесения записи в БД (таблица user)

									if ($result)
									{
											echo ' </br></br><h1 style="font-style:italic" align="center">Пользователь зарегистрирован</h1>';
											
											echo '<form action="main.html" method="POST">
											<p style="text-align: center;"><input type="submit" onclick="location.href="check_session.php"" value="На главную" class = "default_button"></p>
											</form>';

									}
									else
										{
											echo ' </br></br><h1 style="font-style:italic" align="center">Пользователь не зарегистрирован - возникла ошибка при добавлении в БД</h1>';
											echo '<form action="main.html" method="POST">
														<p style="text-align: center;"><input type="submit" value="На главную" class = "default_button"></p>
													</form>';
											echo '<form action="reg.html" method="POST">
														<p style="text-align: center;"><input type="submit" value="Ввести данные снова " class = "default_button"></p>
													</form>';
										}
										
							
						}

				else
					{
						echo ' </br></br><h1 style="font-style:italic" align="center">Пользователь не зарегистрирован - возникла ошибка:</h1>';
						echo ' <h1 style="font-style:italic" align="center">Введеные пароли не совпадают</h1>';
						
						echo '<form action="main.html" method="POST">
									<p style="text-align: center;"><input type="submit" value="На главную" class = "default_button"></p>
								</form>';
						echo '<form action="reg.html" method="POST">
									<p style="text-align: center;"><input type="submit" value="Ввести данные снова " class = "default_button"></p>
								</form>';

					}
		
		break;
	}

?>

<html><head><link href="cssforlastlab.css" rel="stylesheet" type="text/css"><body style="background-image: url('bg-9.png')"></body></head></html>
