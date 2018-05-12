function checkDate(arg)
{
    if (arg < 10)
        return '0' + arg;
    return arg;
}

function startTime()
{
    var tm = new Date();
    var h = tm.getHours();
    var m = tm.getMinutes();
    var s = tm.getSeconds();
    var d = tm.getDate();
    var month = tm.getMonth() + 1;
    var y = tm.getFullYear();
    var days = new Array('Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб');
    $('#clock').html('Время: ' + checkDate(h) + ':' + checkDate(m) + ':' + checkDate(s) + '<br>' +
                    'Дата: ' + checkDate(d) + '.' + checkDate(month) + '.' + y + ' ' + days[tm.getDay()]);
    t = setTimeout('startTime()', 1000);
}