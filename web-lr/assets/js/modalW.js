var dataModule = 
{
    elem: null,
    event: null,
    todo: null,
};

function modalDialogueWindow() 
{
    $("#container").addClass("blurAll");
    let overlay = $("<div>", {class: "overlay"});
    let window = $("<div>", { class: "modalWindow"});
    let message = $("<div>", { class: "modalWindowMessage",
        text: "Вы уверены? Это действие очистит форму."});
    let buttonY = $("<input>", {type: "button",
        class: "modalWindowButton",
        value: "Нет"});
    let buttonN = $("<input>", {type: "button",
        class: "modalWindowButton",
        value: "Да"});
    window.append(message).append(buttonY).append(buttonN);
    overlay.append(window);
    ($("body")).after(overlay);
    $(".modalWindowButton[value='Да']").on("click", function () {
        closeModalDialogueWindow(true)});
    $(".modalWindowButton[value='Нет']").on("click", function () {
        closeModalDialogueWindow(false)});
    return false;
}

function closeModalDialogueWindow(Ok)
{
    $(".overlay").remove();
    $("#container").removeClass("blurAll");
    if (Ok) 
        dataModule.todo();
}

function addDialogue() 
{
    $(dataModule.elem).on(dataModule.event, function (e) 
    {
        e.preventDefault();
        modalDialogueWindow();
    });
}
