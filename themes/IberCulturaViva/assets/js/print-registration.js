$(function () {
    // initialisation
    $("#main-header").removeClass("sombra");
    // trigger the print window
    setTimeout(function () {
        window.print();
        return;
    }, 500);
    // adjust header on scroll
    $(window).scroll(function () {
        $("#main-header")[0].style.top = 0;
        return;
    });
});