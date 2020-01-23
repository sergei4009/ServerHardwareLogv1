<?php
session_start();

$check_main_page=$S_SESSION['admin'];
	
	switch ($check_main_page)  // обработчик перехода к главной странице для авторизованного пользователя
	{
		case 0:
		case 1:
		header('Location: http://localhost/lastlab/PageWithActions.php');
		break;
		
		default:
		echo " </br></br><h1 style='font-style:italic' align='center'>Внимание!</h1>";
		echo " </br></br><h1 style='font-style:italic' align='center'>Доступ к данному сайту открыт только авторизованным пользователям</h1></br>";
		echo '<form action="main.html" method="POST">
				<p style="text-align: center;"><input type="submit" value="Главная" class = "default_button"></p>
			</form>	" ';
		
		break;
	}
?>
<html><head><link href="cssforlastlab.css" rel="stylesheet" type="text/css"><body style="background-image: url('bg-9.png')"></body></head></html>
