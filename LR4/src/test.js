$(document).ready(function()
{
    createMenu();
    startTime();
    var q1 = new Popover('q1Pop', 'q1', 'input[name="q1"]');
    for (var i = 0; i < document.testForm.q1.length; i++)
    {
        document.testForm.q1[i].onmouseover = function (){ q1.showPopover(10); };
        document.testForm.q1[i].onmouseout = function (){ q1.hidePopover(10); };
    }
    var q2 = new Popover('q2Pop', 'q2', 'select[name="q2"]');
    document.testForm.q2.onmouseover = function (){ q2.showPopover(10); };
    document.testForm.q2.onmouseout = function (){ q2.hidePopover(10); };
    var q3 = new Popover('q3Pop', 'q3', 'textarea[name="q3"]');
    document.testForm.q3.onmouseover = function (){ q3.showPopover(1000); };
    document.testForm.q3.onmouseout = function (){ q3.hidePopover(1000); };
    dataModule.elem = "button[type=reset]";
    dataModule.event = "click";
    dataModule.todo = function () 
    {
        document.testForm.q2.value = '';
        document.testForm.q3.value = '';
    };
    addDialogue();
});

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