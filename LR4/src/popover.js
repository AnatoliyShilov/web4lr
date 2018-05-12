class Popover
{
    constructor(name, text, element)
    {
        this.name = name;
        var content = 
            '<div id = "' + this.name + '" class = "rama background popover">' + 
                text + 
            '</div>';
        this.name = '#' + this.name;
        $('body').append(content);
        element = $(element);
        $(this.name).hide().offset({top: element.offset().top, left: element.offset().left + element.outerWidth(true) + $(this.name).outerWidth(true)});
    }

    hidePopover(ms)
    {
        setTimeout('$("' + this.name + '").hide();', ms);
    }

    showPopover(ms)
    {
        setTimeout('$("' + this.name + '").show()', ms);
    }
}
