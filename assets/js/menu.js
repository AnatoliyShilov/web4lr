var translate = {
locale : Array(
	'index',
	'aboutMe',
	'myInterests',
	'study',
	'fotos',
	'contact',
	'guestBook',
	'blog',
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
	'Гостевая книга',
	'Блог',
	'Тест по дисциплине',
	'История'
)};

var menuInfo = 
{
	id: {
		'main':{},
		'aboutMe':{},
		'myInterests':{
			href: Array(
				'/web-lr/user/myInterests#myHobbies',
				'/web-lr/user/myInterests#books',
				'/web-lr/user/myInterests#musics',
				'/web-lr/user/myInterests#films',
				'/web-lr/user/myInterests#games'
			),
			name: Array(
				'Хобби',
				'Книги',
				'Музыка',
				'Фильмы',
				'Игры'
			)
		},
		'study':{},
		'fotos':{},
		'contact':{},
		'guestBook':{},
		'blog':{},
		'test':{},
		'story':{}
	},
	href: Array(
		'/web-lr/',
		'/web-lr/user/aboutMe/',
		'/web-lr/user/myInterests/',
		'/web-lr/user/study/',
		'/web-lr/user/fotos/',
		'/web-lr/user/contact/',
		'/web-lr/user/guestBook/',
		'/web-lr/user/blog/',
		'/web-lr/user/test/',
		'/web-lr/user/story/'
	),
	name: Array(
		'Главная',
		'Обо мне',
		'Мои интересы',
		'Учеба',
		'Фотоальбом',
		'Контакт',
		'Гостевая книга',
		'Блог',
		'Тест по дисциплине',
		'История'
	)
}

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
	let ul = $('<ul>');
	$('#menu').append(ul);
	let li, a;
	let k = 0;
	for (let i in menuInfo.id)
	{
		li = $('<li>', {id: i, class: 'blur', onmouseover: 'setFocusIMG(this)', onmouseout: 'setBlurIMG(this)'});
		a = $('<a>', {href: menuInfo.href[k]})
			.append(menuInfo.name[k]);
		li.append(a);
		if (menuInfo.id[i].href != undefined)
		{
			let showF = function ()
			{
				$('#'+ i + 'Menu').css({'visibility': 'visible', 'display': 'block'});
			}
			let hideF = function ()
			{
				$('#' + i + 'Menu').css({'visibility': 'hidden', 'display': 'none'});
			}
			a.on('mouseenter', showF).on('mouseleave', hideF);
			let subul, subli, divSubMenu;
			divSubMenu = $('<div>', {id: i + 'Menu', class: 'rama'})
							.on('mouseenter', showF)
							.on('mouseleave', hideF)
							.css({'position': 'absolute', 'visibility': 'none', 'display': 'none', 'background': '#CFD4F7'});
			subul = $('<ul>')
					.on('mouseleave', hideF);
			divSubMenu.append(subul);
			li.append(divSubMenu);
			for (let j = 0; j < menuInfo.id[i].name.length; j++)
			{
				a = $('<a>', {href: menuInfo.id[i].href[j]})
					.append(menuInfo.id[i].name[j])
					.on('mouseenter', showF);
				subli = $('<li>', {type: 'disc'})
						.css({listStyleImage: 'none'})
						.append(a);
				subul.append(subli);
			}
		}
		ul.append(li);
		k++;
	}
	var buf = window.location.toString().split('/');
	let s = false;
	for (let i = 0; i < buf.length - 1; i++)
	{
		if (buf[i] == 'user')
		{
			i++;
			buf = buf[i];
			s = true;
			break;
		}
	}
	if (!s)
		buf = 'main';
	buf = buf.split('#')[0];
	var liCur = $('#' + buf)[0];
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
