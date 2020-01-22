<?php 
session_start();

	$db_host = "localhost"; 
	$db_user = "root"; // Логин БД
	$db_password = ""; // Пароль БД
	$db_base = 'company_devices'; // Имя БД
	$db_table = "user"; // Имя Таблицы БД
	$login = $_POST['login'];
	$pass = $_POST['password'];
	$admin=1; 
	
	// Подключение к базе данных
	$mysqli = new mysqli($db_host,$db_user,$db_password,$db_base);

		$sql = mysqli_query($mysqli, "SELECT id,user_login FROM user WHERE user_login = '$login' AND user_password = '$pass' AND admin_rules = '$admin' ");   //проверка администраторских прав у введенного пользователя 
		
		$assoc_array_admin = mysqli_fetch_array($sql);
		
		$row_cnt = mysqli_num_rows($sql);
		
		if ($row_cnt)
		{
			
			header('Refresh: 5; url= PageWithActions.php');
			
			$_SESSION['userid'] = $assoc_array_admin['id']; 
			$_SESSION['main_page'] = 1;	 // установка главной страницей администраторской панели
			
			echo " </br></br><h1 style='font-style:italic' align='center'>Hello - admin</h1></br></br></br>";
			echo " <h1 style='font-style:italic' align='center'>Через 5 секунд вы будете перенаправлены на страницу сайта</h1></br></br></br>";
		} 
		
		else                    //если пользователь с администраторскими правами не найден,то осуществляется поиск по всей таблице пользователя с введенными логином/паролем
		{
			$sql1 = mysqli_query($mysqli, "SELECT id FROM user WHERE user_login = '$login' AND user_password = '$pass' ");
			$row_cnt = mysqli_num_rows($sql1);
			$assoc_array_defaultUser = mysqli_fetch_array($sql1);

			if ($row_cnt)
		{
			header('Refresh: 5; url=PageWithActions.php');
			
			$_SESSION['userid'] = $assoc_array_defaultUser['id'];
			$_SESSION['main_page'] = 0; // установка главной страницей обычной пользовательской главной страницей
			
			echo "</br></br><h1 style='font-style:italic' align='center'>Hello - default user</h1></br></br></br>";
			echo "</br></br><h1 style='font-style:italic' align='center'>Через 5 секунд вы будете перенаправлены на  страницу сайта</h1></br>";
		} 
			else 
			{
				echo "</br></br><h1 style='font-style:italic' align='center'>Учетная запись с данным логином/паролем не найдена </h1></br>";
				echo "<p style='font-style:italic; text-align: center;'><input type='submit' class = 'default_button' onclick=location.href='main.html' value='Ввести данные заново'></p><br/>";
				echo "<p style='font-style:italic; text-align: center;'><input type='submit' class = 'default_button' onclick=location.href='reg.html' value='Зарегистрироваться'></p><br/>";
			}
			
		}
?>
<html><head><link href="cssforlastlab.css" rel="stylesheet" type="text/css"><body style="background-image: url('bg-9.png')"></head><body></body></html>