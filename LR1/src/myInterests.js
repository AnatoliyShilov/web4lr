var paragraph = new Array
(
	'мои увлечения.',
	'мои любимые книги.',
	'моя любимая музыка.',
	'мои любимые фильмы.',
	'мои любимые компьютерные игры.'
);
var data = new Array
(
	new Array
	(
		'Аниме',
		'Программирование',
		'Чтение',
		'Катание на велосипеде'
	),
	new Array
	(
		'Рожденные туманом',
		'Песнь "Льда и Пламени"',
		'Мы',
		'Дивный новый мир',
		'Дом в 1000 этажей',
		'Обреченное королевство',
		'И не осталось никого',
		'Ящик Пандоры',
		'Правила рыцаря солнца'
	),
	new Array
	(
		'PowerWolf',
		'Miracle of sound',
		'Amarante',
		'Helenstorm',
		'Rammstein',
		'Lindsey Stirling',
		'Король и шут',
		'Aqua',
		'и др.'
	),
	new Array
	(
		'Стражи галактики vol.1',
		'Стражи галактики vol.2',
		'Тор: Рагнарек',
		'Оно',
		'Человек-паук: Взвращение домой',
		'Трансформеры: Последний рыцарь',
		'Темная башня',
		'Логан',
		'Призрак в доспехах'
	),
	new Array
	(
		'Dark Souls: Prepare to die edition',
		'Dark Souls II: Scholar of the first sin',
		'Dark Souls III',
		'Grim Down',
		'Borderlands 2',
		'Borderlands: The pre-sequel',
		'Sins of solar empire',
		'Civilization V: Brave new world',
		'Civilization: Beyond earth'
	)
);
window.onload = function () 
{
	createMenu();
	startTime();
	var divs = new Array
	(
		document.getElementById('myHobbies'),
		document.getElementById('books'),
		document.getElementById('musics'),
		document.getElementById('films'),
		document.getElementById('games')
	);
	var content;
	content = '<h3>' + paragraph[0] + '</h3>';
	content += createOL(data[0][0], 
						data[0][1], 
						data[0][2], 
						data[0][3]);
	content += '<a href = "#chapters">' +
				'<p>Наверх</p></a>' +
				'<hr class = "rama">';
	divs[0].innerHTML = content;
	content = '<h3>' + paragraph[1] + '</h3>';
	content += createOL(data[1][0], 
						data[1][1], 
						data[1][2], 
						data[1][3], 
						data[1][4], 
						data[1][5],
						data[1][6],
						data[1][7],
						data[1][8]);
	content += '<a href = "#chapters">' +
				'<p>Наверх</p></a>' +
				'<hr class = "rama">';
	divs[1].innerHTML = content;
	content = '<h3>' + paragraph[2] + '</h3>';
	content += createOL(data[2][0], 
						data[2][1], 
						data[2][2], 
						data[2][3], 
						data[2][4], 
						data[2][5],
						data[2][6],
						data[2][7],
						data[2][8]);
	content += '<a href = "#chapters">' +
				'<p>Наверх</p></a>' +
				'<hr class = "rama">';
	divs[2].innerHTML = content;
	content = '<h3>' + paragraph[3] + '</h3>';
	content += createOL(data[3][0], 
						data[3][1], 
						data[3][2], 
						data[3][3], 
						data[3][4], 
						data[3][5],
						data[3][6],
						data[3][7],
						data[3][8]);
	content += '<a href = "#chapters">' +
				'<p>Наверх</p></a>' +
				'<hr class = "rama">';
	divs[3].innerHTML = content;
	content = '<h3>' + paragraph[4] + '</h3>';
	content += createOL(data[4][0], 
						data[4][1], 
						data[4][2], 
						data[4][3], 
						data[4][4], 
						data[4][5],
						data[4][6],
						data[4][7],
						data[4][8]);
	content += '<a href = "#chapters">' +
				'<p>Наверх</p></a>' +
				'<hr class = "rama">';
	divs[4].innerHTML = content;
}

function createOL()
{
	var ol = '<ol>';
	for (var i = 0; i < arguments.length; i++)
		ol += '<li>' + arguments[i] + '</li>';
	return ol + '</ol>';
}
