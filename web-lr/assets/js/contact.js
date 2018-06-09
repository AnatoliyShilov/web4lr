var calendarFocus = false;
var valid = new Array(7);
valid[0] = false; const MASSAGE = 0;
valid[1] = false; const FIO = 1;
valid[2] = false; const SEX = 2;
valid[3] = false; const BDAY = 3;
valid[4] = false; const AGE = 4;
valid[5] = false; const PHONE = 5;
valid[6] = false; const EMAIL = 6;
var interval = 
{
    dayF: new Date(),
    dayL: new Date(),
    swap: function()
    {
        var buf = this.dayF;
        this.dayF = this.dayL;
        this.dayL = buf;
    }
};
interval.dayF = undefined;
interval.dayL = undefined;

window.onload = function()
{
    createMenu();
    startTime();
    // document.contactForm.contact.disabled = true;
    var unavailable = new Array(
        new Date(2018, 4 - 1, 8),
        new Date(2018, 4 - 1, 1),
        new Date(2018, 4 - 1, 28)
    );
    calendarShow(unavailable);
}

function calendarShow(unavailable)
{
    calendarFocus = true;
    $('#calendar').html(
        '<select name = "monthSelect">' +
        '<option value = "0">Январь</option>' +
        '<option value = "1">Февраль</option>' +
        '<option value = "2">Март</option>' +
        '<option value = "3">Апрель</option>' +
        '<option value = "4">Май</option>' + 
        '<option value = "5">Июнь</option>' +
        '<option value = "6">Июль</option>' +
        '<option value = "7">Август</option>' +
        '<option value = "8">Сентябрь</option>' +
        '<option value = "9">Октябрь</option>' +
        '<option value = "10">Ноябрь</option>' +
        '<option value = "11">Декабрь</option>' +
        '<input type = "number" name = "yearSelect" value = "" min = "0" max = "9999" size = "4">'+
        '</select>' +
        '<div id = "tCalendar">' +
        '<div>' +
            '<div class = "rama cell">Пн</div>' + 
            '<div class = "rama cell">Вт</div>' +
            '<div class = "rama cell">Ср</div>' +
            '<div class = "rama cell">Чт</div>' +
            '<div class = "rama cell">Пт</div>' +
            '<div class = "rama cell">Сб</div>' +
            '<div class = "rama cell">Вс</div></div>' +
        '<div id = "tbCalendar"></div>' +
        '</div>')
        ;
    Calendar('tCalendar', new Date().getFullYear(), new Date().getMonth(), unavailable);
    // if (document.contactForm.bDay.value == '')
    //     Calendar('tCalendar', new Date().getFullYear(), new Date().getMonth(), unavailable);
    // else
    // {
    //     var date = document.contactForm.bDay.value.split('/');
    //     Calendar('tCalendar', date[2], Number(date[0]) - 1, unavailable);
    // }
    document.contactForm.monthSelect.onchange = function()
    {
        Calendar('tCalendar', document.contactForm.yearSelect.value, document.contactForm.monthSelect.value, unavailable);
    }
    document.contactForm.yearSelect.onchange = function()
    {
        Calendar('tCalendar', document.contactForm.yearSelect.value, document.contactForm.monthSelect.value, unavailable);
    }
    $('#tCalendar').click(function(event)
    {
        event = event || window.event;
        var target = event.target || event.srcElement;
        if (target.tagName == 'DIV' && 
            target.innerHTML != '' && 
            Number(target.innerHTML) && 
            target.getAttribute('class').search(/cell/) != -1 &&
            target.getAttribute('class').search(/unavailable/) == -1)
        {
            if (interval.dayF == undefined && interval.dayL == undefined || 
                interval.dayF != undefined && interval.dayL != undefined)
            {
                interval.dayL = undefined;
                interval.dayF = new Date(
                                        Number(document.contactForm.yearSelect.value), 
                                        Number(document.contactForm.monthSelect.value), 
                                        Number(target.innerHTML)
                                    );
                document.contactForm.bDay.value = '';
                // removeGreenBorder(document.contactForm.bDay);
            }
            else
            {
                interval.dayL = new Date(
                                        Number(document.contactForm.yearSelect.value), 
                                        Number(document.contactForm.monthSelect.value), 
                                        Number(target.innerHTML)
                                    );
                if (interval.dayL < interval.dayF)
                    interval.swap();
                $('#tbCalendar').html('');
                Calendar('tCalendar', document.contactForm.yearSelect.value, document.contactForm.monthSelect.value, unavailable, interval)
                document.contactForm.bDay.value = 
                                                (interval.dayF.getMonth() + 1) + '/' +
                                                interval.dayF.getDate() + '/' +
                                                interval.dayF.getFullYear() + '-' +
                                                (interval.dayL.getMonth() + 1) + '/' +
                                                interval.dayL.getDate() + '/' +
                                                interval.dayL.getFullYear();
                // setGreenBorder(document.contactForm.bDay);
                // valid[BDAY] = true;
                // validateForm();
            }
            // $('#bDayErr').html('');
        }
        else
        {
            // setRedBorder(document.contactForm.bDay);
            // valid[BDAY] = false;
            // document.contactForm.contact.disabled = true;
            // document.contactForm.bDay.focus();
            // document.contactForm.bDay.value = '';
            // document.getElementById('bDayErr').innerHTML = 'Введите дату рождения';
        }
    });
}

function Calendar(id, year, month, unavailable, interval = undefined) 
{
    month = Number(month);
    year = Number(year);
    var Dlast = new Date(year, month + 1, 0).getDate();
    var D = new Date(year, month, Dlast);
    var DNlast = D.getDay();
    var DNfirst = new Date(D.getFullYear(), D.getMonth(), 1).getDay();
    var calendar = '<div>';
    document.contactForm.monthSelect.value = D.getMonth();
    document.contactForm.monthSelect.selected = true;
    document.contactForm.yearSelect.value = D.getFullYear();
    if (DNfirst != 0) 
        for (var i = 1; i < DNfirst; i++) 
            calendar += '<div class = "empty"></div>';
    else
        for (var  i = 0; i < 6; i++) 
            calendar += '<div class = "empty"></div>';
    var unavailableDay = false;
    var selectedDay = false;
    for (var  i = 1; i <= Dlast; i++) 
    {
        for (let j = 0; j < unavailable.length; j++)
        {
            if (i == unavailable[j].getDate() && 
                D.getMonth() == unavailable[j].getMonth() && 
                D.getFullYear() == unavailable[j].getFullYear())
            {
                calendar += '<div class = "unavailable cell rama">' + i + '</div>';
                unavailableDay = true;
                break;
            }
        }
        if (!unavailableDay && interval &&
            interval.dayF.getFullYear() <= D.getFullYear() &&
            D.getFullYear() <= interval.dayL.getFullYear() &&
            interval.dayF.getMonth() <= D.getMonth() &&
            D.getMonth() <= interval.dayL.getMonth() &&
            interval.dayF.getDate() <= i &&
            i <= interval.dayL.getDate())
            {
                calendar += '<div class = "selected cell rama">' + i + '</div>';
                selectedDay = true;
            }
        if (!unavailableDay && !selectedDay)
            if (i == new Date().getDate() && 
                D.getFullYear() == new Date().getFullYear() && 
                D.getMonth() == new Date().getMonth())
                calendar += '<div class = "today rama cell">' + i + '</div>';
            else
                calendar += '<div class = "rama cell">' + i + '</div>';
        if (new Date(D.getFullYear(), D.getMonth(), i).getDay() == 0)
            calendar += '</div><div>';
        unavailableDay = false;
        selectedDay = false;
    }
    $('#tbCalendar').html(calendar);
}

function isNum(form)
{
    for (var i = 0; i < form.elements.length; i++)
    {
        if ((form.elements[i].getAttribute('type') == 'text') || 
            (form.elements[i].tagName == 'TEXTAREA'))
            if (form.elements[i].value != '')
                if (form.elements[i].value.search(/(\d+(\.\d+)?\s+)+/) == 0)
                    alert('число');
                else
                    alert('не число');
    }
}

function validateMassage()
{
    // var massage = document.contactForm.massage;
    // if (massage.value == '')
    // {
    // 	massage.focus();
    //     $('#massageErr').html('Введите сообщение');
    //     setRedBorder(massage);
    //     valid[MASSAGE] = false;
    //     document.contactForm.contact.disabled = true;
    //     return false;
    // }
    // $('#massageErr').html('');
    // setGreenBorder(massage);
    // valid[MASSAGE] = true;
    // validateForm();
    return true;
}

function validateFIO()
{
    // var FIO_ = document.contactForm.FIO;
    // if (FIO_.value.search(/[a-zа-яёA-ZА-Я]+\s+[a-zа-яёA-ZА-Я]+\s+[a-zа-яёA-ZА-Я]+/) == -1)
    // {
    // 	FIO_.focus();
    //     $('#FIOErr').html('Введите ФИО: требуется 3 слова');
    //     setRedBorder(FIO_);
    //     valid[FIO] = false;
    //     document.contactForm.contact.disabled = true;
    // 	return false;
    // }
    // $('#FIOErr').html('');
    // setGreenBorder(FIO_);
    // valid[FIO] = true;
    // validateForm();
    return true;
}

function validateSex()
{
    // var unchecked = 0;
    // var sex = document.contactForm.sex;
    // for (var i = 0; i < sex.length; i++)
    // 	if (!sex[i].checked)
    // 		unchecked++;
    // if (unchecked == sex.length)
    // {
    // 	sex[0].focus();
    //     $('#sexErr').html('Введите пол');
    //     valid[SEX] = false;
    //     document.contactForm.contact.disabled = true;
    // 	return false;
    // }
    // $("#sexErr").html('');
    // valid[SEX] = true;
    // validateForm();
    return true;
}

function validateAge()
{
    // var age = document.contactForm.age;
    // if (age.value == '')
    // {
    //     age.focus();
    //     $('#ageErr').html('Введите возраст');
    //     setRedBorder(age);
    //     valid[AGE] = false;
    //     document.contactForm.contact.disabled = true;
    //     return false;
    // }
    // $('#ageErr').html('');
    // setGreenBorder(age);
    // valid[AGE] = true;
    // validateForm();
    return true;
}

function validatePhone()
{
    // var phone = document.contactForm.phone;
    // if (phone.value.search(/[+][73]\d{9,11}/) == -1)
    // {
    // 	phone.focus();
    //     $('#phoneErr').html('Поле телефон заполнено не правильно. Только цифры');
    //     setRedBorder(phone);
    //     valid[PHONE] = false;
    //     document.contactForm.contact.disabled = true;
    // 	return false;
    // }
    // $('#phoneErr').html('');
    // setGreenBorder(phone);
    // valid[PHONE] = true;
    // validateForm();
    return true;
}

function validateEmail()
{
    // var email = document.contactForm.email;
    // if (email.value == '')
    // {
    // 	email.focus();
    //     $('#emailErr').html('Введите E-mail');
    //     setRedBorder(email);
    //     valid[EMAIL] = false;
    //     document.contactForm.contact.disabled = true;
    // 	return false;
    // }
    // $('#emailErr').html('');
    // setGreenBorder(email);
    // valid[EMAIL] = true;
    // validateForm();
    return true;
}

function removeGreenBorder(inputObject)
{
    if (inputObject.classList.contains('inputGood'))
        inputObject.classList.remove('inputGood');
}

function removeRedBorder(inputObject)
{
    if (inputObject.classList.contains('inputError'))
        inputObject.classList.remove('inputError');
}

function setGreenBorder(inputObject)
{
    inputObject.classList.add('inputGood');
    removeRedBorder(inputObject);
}

function setRedBorder(inputObject)
{
    inputObject.classList.add('inputError');
    removeGreenBorder(inputObject);
}

function resetBorder(inputObject)
{
    if (inputObject.classList.contains('inputGood'))
        inputObject.classList.remove('inputGood');
    if (inputObject.classList.contains('inputError'))
        inputObject.classList.remove('inputError');
}

function validateForm()
{
    // for (var i = 0; i < valid.length; i++)
    //     if (!valid[i])
    //     {
    //         document.contactForm.contact.disabled = true;
    //         return false;
    //     }
    // document.contactForm.contact.disabled = false;
    return true;
}

function cleanErr()
{
    $('#massageErr').html('');
    $('#FIOErr').html('');
    $('#sexErr').html('');
    $('#bDayErr').html('');
    $('#ageErr').html('');
    $('#phoneErr').html('');
    $('#emailErr').html('');
    for (var i = 0; i < valid.length; i++)
        valid[i] = false;
    var f = document.contactForm;
    resetBorder(f.massage);
    resetBorder(f.FIO);
    resetBorder(f.bDay);
    resetBorder(f.age);
    resetBorder(f.phone);
    resetBorder(f.email);
}