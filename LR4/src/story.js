window.onload = function()
{
	createMenu();
    startTime();
    showLocalStorage();
    showGlobalStorage();
};

var pName = new Array(
    'Главная',
	'Обо мне',
	'Мои интересы',
	'Учеба',
	'Фотоальбом',
	'Контакт',
	'Тест по дисциплине',
	'История'
);

function showLocalStorage()
{
    var content = '<table><caption>История LocalStorage</caption>';
    for (let i = 0; i < pName.length; i++)
    {
        content += '<tr><td>' + pName[i] + '</td><td>';
        if (localStorage.getItem(pName[i]))
            content += localStorage.getItem(pName[i]);
        else    
            content += '0';
        content += '</td></tr>';
    }
    document.getElementById('localstory').innerHTML = content + '</table>';
}

function showGlobalStorage()
{
    var content = '<table><caption>История Cookie</caption>';
    var cookie = document.cookie.split(';');
    var visits;
    for (let i = 0; i < pName.length; i++)
    {
        content += '<tr><td>' + pName[i] + '</td><td>';
        visits = 0;
        for (let j = 0; j < cookie.length; j ++)
            if (cookie[j].search(pName[i]) != -1)
            {
                visits = Number(cookie[j].split('=')[1]);
                break;
            }
        content += visits + '</td></tr>';
    }
    document.getElementById('globalstory').innerHTML = content + '</table>';
}

function clearLocalStorage()
{
    localStorage.clear();
    showLocalStorage();
}