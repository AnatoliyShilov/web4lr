function notificationWindow(info, after = undefined) 
{
    $("#container").addClass("blurAll");
    let overlay = $("<div>", {class: "overlay"});
    let window = $("<div>", { class: "modalWindow"});
    let message = $("<div>", { class: "modalWindowMessage", text: info});
    let button = $("<input>", {type: "button", class: "modalWindowButton", value: "Ok"});
    window.append(message).append(button);
    overlay.append(window);
    $("body").after(overlay);
    $(".modalWindowButton[value='Ok']").on("click", function () {
        closeNotificationWindow(after)});
    return false;
}

function closeNotificationWindow(after)
{
    $(".overlay").remove();
    $("#container").removeClass("blurAll");
    if (after != undefined)
        after();
}