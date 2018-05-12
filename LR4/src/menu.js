var translate = {
locale : Array(
	'index',
	'aboutMe',
	'myInterests',
	'study',
	'fotos',
	'contact',
	'test',
	'story'
), 
pName : Array(
	'Главная',
	'Обо мне',
	'Мои интересы',
	'Учеба',
	'Фотоальбом',
	'Контакт',
	'Тест по дисциплине',
	'История'
)};

function setCookie(name, value, timeLife)
{
	document.cookie = name + '=' + value + ';expires=' + timeLife;
}

function getCookie(name)
{
	var value;
	var cookie = document.cookie.split(';');
	for (let i = 0; i < cookie.length; i++)
		if (cookie[i].search(name) != -1)
		{
			value = cookie[i].split('=')[1];
			break;
		}
	return value;
}

function createMenu()
{
	var date = new Date();
	var visit
	var pId;
	for (let i = 0; i < translate.locale.length; i++)
		if (window.location.toString().search(translate.locale[i]) != -1)
			{
				pId = i;
				break;
			}
	if (localStorage.getItem(translate.pName[pId]))
		visit = Number(localStorage.getItem(translate.pName[pId])) + 1;
	else
		visit = 1;
	localStorage.setItem(translate.pName[pId], visit.toString());
	visit = getCookie(translate.pName[pId]);
	if (visit == undefined)
		visit = 1;
	else
		visit = Number(visit) + 1;
	date.setDate(date.getDate() + 1);
	setCookie(translate.pName[pId], visit.toString(), date.toUTCString()); 
	$('#menu').html(
		'<ul>' +
			'<li id = "index" class = "blur" onmouseover = "setFocusIMG(this)" onmouseout = "setBlurIMG(this)">' +
				'<a href = "index.html">Главная</a></li>' +
			'<li id = "aboutMe" class = "blur" onmouseover = "setFocusIMG(this)" onmouseout = "setBlurIMG(this)">' +
				'<a href = "aboutMe.html">Обо мне</a></li>' +
			'<li id = "myInterests" class = "blur" onmouseover = "setFocusIMG(this)" onmouseout = "setBlurIMG(this)">' +
				'<a href = "myInterests.html" onmouseover = "showInterestsMenu()" onmouseout = "hideInterestsMenu()">Мои интересы</a></li>' +
			'<div id = "interestsMenu" class = "rama" onmouseout = "hideInterestsMenu()" onmouseover = "showInterestsMenu()">' +
				'<ul onmouseout="hideInterestsMenu()">' +
					'<li><a href = "myInterests.html#myHobbies" onmouseover = "showInterestsMenu()">Хобби</a></li>' +
					'<li><a href = "myInterests.html#books" onmouseover = "showInterestsMenu()">Книги</a></li>' +
					'<li><a href = "myInterests.html#musics" onmouseover = "showInterestsMenu()">Музыка</a></li>' +
					'<li><a href = "myInterests.html#films" onmouseover = "showInterestsMenu()">Фильмы</a></li>' +
					'<li><a href = "myInterests.html#games" onmouseover = "showInterestsMenu()">Игры</a></li>' +
				'</ul>' +
			'</div>' +
			'<li id = "study" class = "blur" onmouseover = "setFocusIMG(this)" onmouseout = "setBlurIMG(this)">' +
				'<a href = "study.html">Учеба</a></li>' +
			'<li id = "fotos" class = "blur" onmouseover = "setFocusIMG(this)" onmouseout = "setBlurIMG(this)">' +
				'<a href = "fotos.html">Фотоальбом</a></li>' +
			'<li id = "contact" class = "blur" onmouseover = "setFocusIMG(this)" onmouseout = "setBlurIMG(this)">' +
				'<a href = "contact.html">Контакт</a></li>' +
			'<li id = "test" class = "blur" onmouseover = "setFocusIMG(this)" onmouseout = "setBlurIMG(this)">' +
				'<a href = "test.html">Тест по дисциплине</a></li>' +
			'<li id = "story" class = "blur" onmouseover = "setFocusIMG(this)" onmouseout = "setBlurIMG(this)">' +
				'<a href = "story.html">История</a></li>' +
		'</ul>');
	var buf = window.location.toString().split('.')[0].split('/');
	var liCur = $('#' + buf[buf.length - 1])[0];
	liCur.classList.remove('blur');
	liCur.classList.add('activ');
	liCur.firstChild.onclick = function(){return false;};
}

function setFocusIMG(liObj)
{
	if (liObj.classList.contains('activ'))
		return;
	liObj.classList.remove('blur');
	liObj.classList.add('focus');
}

function setBlurIMG(liObj)
{
	if (liObj.classList.contains('activ'))
		return;
	liObj.classList.remove('focus');
	liObj.classList.add('blur');
}

function showInterestsMenu()
{
	$('#interestsMenu').css({'visibility': 'visible', 'display': 'block'});
}

function hideInterestsMenu()
{
	$('#interestsMenu').css({'visibility': 'hidden', 'display': 'none'});
}