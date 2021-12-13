$(function () {
    // initialisation
    // const $footer = $("footer");
    // $footer.before("<div id=\"empty-footer\">.</div>");
    $("#main-header").removeClass("sombra");
    // trigger the print window
    setTimeout(function () {
        // $(window).resize();
        window.print();
        return;
    }, 500);
    // adjust height of empty-footer
    // $(window).resize(function () {
    //     $("#empty-footer").height($footer.height());
    //     return;
    // });
    // adjust header on scroll
    $(window).scroll(function () {
        $("#main-header")[0].style.top = 0;
        return;
    });
});