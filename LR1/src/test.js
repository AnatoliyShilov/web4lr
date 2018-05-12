window.onload = function()
{
    createMenu();
    startTime();
}

function validateForm( )
{
    var unchecked = 0;
    for (var i = 0; i < document.testForm.q1.length; i++)
        if (!document.testForm.q1[i].checked)
            unchecked++;
    if (unchecked == document.testForm.q1.length)
    {
        document.testForm.q1[0].focus();
        alert('Ответьте на 1 вопрос!');
        return false;
    }
    if (document.testForm.q2.value == '')
    {
        document.testForm.q2.focus();
        alert('Ответьте на 2 вопрос!');
        return false;
    }
    if (document.testForm.q3.value.search(
/\s*[a-zA-Zа-яА-Я0-1]+[.,:;!?]?\s*(\s[\-])?\s*(\s[a-zA-Zа-яА-Я0-1]+[.,;:!?]?\s*(\s[\-])?\s*){2,}/
        ) == -1)
    {
        document.testForm.q3.focus();
        alert('Ответьте на 3 вотпрос!');
        return false;
    }
    return true;
}