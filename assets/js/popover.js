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

    showPopover(ms)
    {
        this.enter = new Date();
        this.msShow = ms;
        this.show = setTimeout('$("' + this.name + '").show()', ms);
    }

    hidePopover(ms)
    {
        let leave = new Date();
        if (this.enter - leave < this.msShow)
            clearTimeout(this.show);
        setTimeout('$("' + this.name + '").hide();', ms);
    }
}
