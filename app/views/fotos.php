<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<link rel = "stylesheet" type = "text/css" href = "assets/css/myStyles.css">
		<link rel="stylesheet" type="text/css" href = "assets/css/foto.css">
		<script type = "text/javascript" src = "assets/js/jquery-3.3.1.min.js"></script>
		<script type = "text/javascript" src = "assets/js/clock.js"></script>
		<script type = "text/javascript" src = "assets/js/menu.js"></script>
		<script type="text/javascript" src = "assets/js/fotos.js"></script>
		<title>Лабораторная работа №1</title>
	</head>
	<body>
		<header>
			<h1>Фотоальбом</h1>
		</header>
		<div id = "container">
			<div id = "all">
				<nav>
					<div id = "menu"></div>
					<div class = "rama" id = "clock"></div>
				</nav>
				<main>
					<p>Совы не то, чем кажутся.</p>
				</main>
				<div id = "view" style = "position: absolute; width: 100%"></div>
				<div id = "galery" style = "width: 100%">
					<?php echo $galery ?>
				</div>
				<form method = "post" name = "protectLr5" action = "/web-lr/user/fotos/">
					<button type = "submit" name = "plus" value = "<? echo $countInStr ?>">Плюс</button>
					<button type = "submit" name = "minus" value = "<? echo $countInStr ?>">Минус</button>
				</form>
			</div>
			<footer>
				<p>&copy; 2018, Шилов А.И.</p>
			</footer>
		</div>
	</body>
</html>