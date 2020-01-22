<?php
session_start();

	$login = $_POST['login'];
	$check_main_page=$S_SESSION['main_page'];
	
	switch ($check_main_page)  //обработчик выхода из аккаунта
	{
		case 1:
		
		session_unset(); //очистка значений массива
		session_destroy(); //уничтожение сессии
		header('Refresh: 3; url=main.html');
		echo " </br></br><h1 style='font-style:italic' align='center'>Вы вышли из своего аккаунта</h1>";
		echo " </br></br><h1 style='font-style:italic' align='center'>Через 3 секунды вы попадете на страницу входа.</h1></br></br></br>";
		break;
		
		case 0:
		
		session_unset();
		session_destroy();
		header('Refresh: 3; url=main.html');
		echo " </br></br><h1 style='font-style:italic' align='center'>Вы вышли из своего аккаунта</h1>";
		echo " </br></br><h1 style='font-style:italic' align='center'>Через 3 секунды вы попадете на страницу входа.</h1></br></br></br>";
		
		break;
		
		default:
		
		session_unset();
		session_destroy();
		header('Refresh: 4; url= main.html');
		echo " </br></br><h1 style='font-style:italic' align='center'>Внимание!</h1>";
		echo " </br></br><h1 style='font-style:italic' align='center'>Вы не вошли в аккаунт</h1>";
		echo " </br></br><h1 style='font-style:italic' align='center'>Через 4 секунды вы попадете на страницу входа.</h1></br></br></br>";
		
		break;
	}

?>

<html><head><link href="cssforlastlab.css" rel="stylesheet" type="text/css"><head><body style="background-image: url('bg-9.png')"></body></html>