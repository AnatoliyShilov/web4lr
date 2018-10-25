<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<link rel = "stylesheet" type = "text/css" href = "assets/css/myStyles.css">
		<script type = "text/javascript" src = "assets/js/jquery-3.3.1.min.js"></script>
		<script type = "text/javascript" src = "assets/js/clock.js"></script>
		<script type = "text/javascript" src = "assets/js/menu.js"></script>
		<script type = "text/javascript" src = "assets/js/myInterests.js"></script>
		<title>Лабораторная работа №1</title>
	</head>
	<body>
		<header>
			<h1>Мои интересы</h1>
		</header>
		<div id = "container">
			<div id = "all">
				<nav>
					<div id = "menu"></div>
					<div class = "rama" id = "clock"></div>
				</nav>
				<main class = "text">
					<div id = "chapters" align = "center">
						<h2>Список увлечений<h2>
						<div class = "rama text">
								<a href = "#myHobbies"><p>Хобби</p></a>
								<a href = "#books"><p>Книги</p></a>
								<a href = "#musics"><p>Музыка</p></a>
								<a href = "#films"><p>Фильмы</p></a>
								<a href = "#games"><p>Игры</p></a>
						</div>
					</div>
					<div id = "myHobbies"><?= $myHobbies ?></div>
					<div id = "books"><?= $books ?></div>
					<div id = "musics"><?= $musics ?></div>
					<div id = "films"><?= $films ?></div>
					<div id = "games"><?= $games ?></div>
				</div>
			</main>
			<footer>
				<p>&copy; 2018, Шилов А.И.</p>
			</footer>
		</div>
	</body>
</html>