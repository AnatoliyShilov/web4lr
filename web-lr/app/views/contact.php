<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<title>Лабораторная работа №1</title>
		<link rel = "stylesheet" type = "text/css" href = "assets/css/myStyles.css">
		<link rel = "stylesheet" type = "text/css" href = "assets/css/calendar.css">
		<link rel = "stylesheet" type = "text/css" href = "assets/css/modalW.css">
		<script type = "text/javascript" src = "assets/js/jquery-3.3.1.min.js"></script>
		<script type = "text/javascript" src = "assets/js/clock.js"></script>
		<script type = "text/javascript" src = "assets/js/menu.js"></script>
		<script type = "text/javascript" src = "assets/js/contact.js"></script>
		<script type = "text/javascript" src = "assets/js/notificationWindow.js"></script>
	</head>
	<body>
		<header>
			<h1>Контакт</h1>
		</header>
		<div id = "container">
			<div id = "all">
				<nav>
					<div id = "menu"></div>
					<div class = "rama" id = "clock"></div>
				</nav>
				<main>
					<form name = "contactForm" method = "post" action = "/web-lr/user/contact/"> 
						<p>Сообщение</p>
						<textarea name = "massage" rows = "10" style = "width: 98%;" onblur = "validateMassage()"></textarea>
						<div id = "massageErr" class = "error"></div>
						<p>ФИО <input type = "text" name = "FIO" onblur = "validateFIO()"></p>
						<div id = "FIOErr" class = "error"></div>						 
						<p>Пол М <input type = "radio" name = "sex" onblur = "validateSex()" value = "1"> 
								Ж <input type = "radio" name = "sex" value = "2"></p>
						<div id = "sexErr" class = "error"></div>						
						<p>Год рождения <input type = "text" name = "bDay"></p>
						<div id = "bDayErr" class = "error"></div>						
						<div id = "calendar"></div>
						<p>Возраст 
							<select name = "age" onblur = "validateAge()">
							<option></option>
							<option>18</option>
							<option>19</option>
							<option>20</option>
							<option>21</option>
							<option>22</option>
							<option>23</option>
							<option>24</option>
							<option>25</option>
							<option>26</option>
							</select>
						</p>
						<div id = "ageErr" class = "error"></div>						
						<p>Телефон <input type = "text" name = "phone" onblur = "validatePhone()"></p>
						<div id = "phoneErr" class = "error"></div>						
						<p>E-mail <input type = "text" name = "email" onblur = "validateEmail()"></p>
						<div id = "emailErr" class = "error"></div>						
						<p><input type = "reset" name = "clean" value = "Очистить" onclick = "cleanErr()">
						<input type = "submit" name = "contact" value = "Отправить"></p>
					</form>
				</main>
			</div>
			<footer>
				<p>&copy; 2018, Шилов А.И.</p>
			</footer>
		</div>
	</body>
	<?php
		if ($info != NULL)
			echo "<script>notificationWindow(\"$info\", function(){history.back();});</script>";
	?>
</html>