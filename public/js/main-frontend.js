
$('a[href="#"]:not(.normal-link)').click(function ($) {
        $.preventDefault();
    });


$(function () {

    // Padding To Body  (Navbar is fixed)
    // $("body").css("paddingTop", $(".custom-navbar").innerHeight());

    // $(window).resize(function () {
    //     $("body").css("paddingTop", $(".custom-navbar").innerHeight());
    // })


    $(".donation-option .donation-options-item").on("click", function () {
        $(this).addClass("active").parents().siblings().find(".donation-options-item").removeClass("active");
    });

    $(".nav-dropdown .nav-link").on("click", function () {

        $(".nav-link-dollar span").text($(this).text())

    });

    /*
    $('.carousel').carousel({
        interval: 1500
    });
    $("#project-item-img-slide").swiperight(function () {
        $(this).carousel('prev');
    });
    $("#project-item-img-slide").swipeleft(function () {
        $(this).carousel('next');
    });
    */

});

document.querySelectorAll('.my-lightbox-toggle').forEach((el) => el.addEventListener('click', (e) => {
    e.preventDefault();
    const lightbox = new Lightbox(el, options);
    lightbox.show();
}));