<!DOCTYPE html>
<!--вариант 5-->
<html>
	<head>
		<meta charset = "utf-8">
		<title>Лабораторная работа №1</title>
		<link rel = "stylesheet" type = "text/css" href = "assets/css/myStyles.css">
		<link rel = "stylesheet" type = "text/css" href = "assets/css/modalW.css">
		<script type = "text/javascript" src = "assets/js/jquery-3.3.1.min.js"></script>
		<script type = "text/javascript" src = "assets/js/clock.js"></script>
		<script type = "text/javascript" src = "assets/js/menu.js"></script>
		<script type = "text/javascript" src = "assets/js/test.js"></script>
		<script type = "text/javascript" src = "assets/js/popover.js"></script>
		<script type = "text/javascript" src = "assets/js/modalW.js"></script>
		<script type = "text/javascript" src = "assets/js/notificationWindow.js"></script>
	</head>
	<body>
		<header>
			<h1>Тест по "Основам дискретной математики"</h1>
		</header>
		<div id = "container">
			<div id = "all">
				<nav>
					<div id = "menu"></div>
					<div class = "rama" id = "clock"></div>
				</nav>
				<main>
					<form name = "testForm" method="post" action="/web-lr/user/test/" onsubmit = "return validateForm()">
						<h2><p>Вопрос 1</p></h2>
						<p>Даны множества A = {1; 2; 3} и B = {2; 3; 4}. Результатом какой операция над множествами A и B будет являтся множество C = {1; 2; 3; 4}?</p>
						<p>A пересечение B <input type = "RADIO" name = "q1" value = "1"></p>
						<p>A объединение B <input type = "RADIO" name = "q1" value = "2"></p>
						<p>A декартово произведение B <input type = "RADIO" name = "q1" value = "3"></p>
						<p>Никакая <input type = "RADIO" name = "q1" value = "4"></p>
						<hr class = "rama">
						<h2><p>Вопрос 2</p></h2>
						<p>Найти |AUB|, если |A| = 10, |B| = 7, |AB| = 3</p>
						<p>
							|AUB| = 
							<select name = "q2">
								<option></option>
								<option>22</option>
								<option>19</option>
								<option>14</option>
								<option>18</option>
								<option>20</option>
							</select>
						</p>
						<hr class = "rama">
						<h2><p>Вопрос 3</p></h2>
						<p>Понятие множества.</p>
						<textarea name = "q3" rows = "10" style = "width: 98%;"></textarea>
						<p><button type = "reset">Очистить</button>
						<button type = "submit" name = "test">Отправить</button></p>
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
