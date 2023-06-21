const search_js = document.getElementById("searchh");
search_js.addEventListener("keypress", function onEvent(event) {
    if (event.key === "Enter") {
        document.getElementById("search_img").click();
    }
});

$(".dropdown-toggle").on("click", function (e) {
    e.stopPropagation();
    e.preventDefault();

    var self = $(this);
    if (self.is(".disabled, :disabled")) {
        return false;
    }
    self.parent().toggleClass("open");
});

$(document).on("click", function (e) {
    if ($(".dropdown").hasClass("open")) {
        $(".dropdown").removeClass("open");
    }
});

$(".nav-btn.nav-slider").on("click", function () {
    $(".overlay").show();
    $("nav").toggleClass("open");
});

$(".overlay").on("click", function () {
    if ($("nav").hasClass("open")) {
        $("nav").removeClass("open");
    }
    $(this).hide();
});

$("#modal_trigger").leanModal({
    top: 100,
    overlay: 0.6,
    closeButton: ".modal_close"
});

$(function () {
    $("#login_form").click(function () {
        $(".social_login").hide();
        $(".user_login").show();
        return false;
    });

    $("#register_form").click(function () {
        $(".social_login").hide();
        $(".user_register").show();
        $(".header_title").text('Registrarse');
        return false;
    });

    $(".back_btn").click(function () {
        $(".user_login").hide();
        $(".user_register").hide();
        $(".social_login").show();
        $(".header_title").text('Iniciar Sesión');
        return false;
    });
});