<?php 
session_start();
		if ($_SESSION["main_page"] != NULL)
			{
					
			}
		
		else 
		{
			echo '</br></br><h1 style="font-style:italic" align="center">Внимание!</h1>
				</br></br><h1 style="font-style:italic" align="center">Доступ к данной странице открыт только авторизованным пользователям</h1></br>
				<form action="http://localhost/lastlab/main.html" method="POST">
					<p style="text-align: center;"><input type="submit" value="Вернуться" class = "default_button"></p>
					</form>" ';		
		}

?>
<html><head><link href="cssforlastlab.css" rel="stylesheet" type="text/css"><body style="background-image: url('bg-9.png')"></body></head></html>


