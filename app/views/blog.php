<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<link rel = "stylesheet" type = "text/css" href = "assets/css/myStyles.css">
		<script type = "text/javascript" src = "assets/js/jquery-3.3.1.min.js"></script>
		<script type = "text/javascript" src = "assets/js/clock.js"></script>
		<script type = "text/javascript" src = "assets/js/menu.js"></script>
		<script type = "text/javascript" src = "assets/js/blog.js"></script>
		<title>Лабораторная работа №1</title>
	</head>
	<body>
		<header>
			<h1>Блог</h1>
		</header>
		<div id = "container">
			<div id = "all">
				<nav>
					<div id = "menu"></div>
					<div class = "rama" id = "clock"></div>
				</nav>
				<main>
					<form name = "blog" method = "post" action = "/web-lr/user/guestBook/">
						
						<input type = "submit" name = "guestBook" value = "Отправить"></p>
					</form>
				</main>
				<?=$info?>
			</div>
			<footer>
				<p>&copy; 2018, Шилов А.И.</p>
			</footer>
		</div>
	</body>
</html>