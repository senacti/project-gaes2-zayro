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
    $(".overlay").toggleClass("show");
    $("nav").toggleClass("open");
});

$(".overlay").on("click", function () {
    if ($("nav").hasClass("open")) {
        $("nav").removeClass("open");
    }
    $(this).removeClass("show");
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

$(function () {
    $('#login-form').on('submit', function (e) {
        e.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: formData,
            dataType: 'json',
            success: function (response) {
                window.location.href = response.redirect;
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    var errorHtml = '';

                    for (var key in errors) {
                        errorHtml += '<p class="error">' + errors[key][0] + '</p>';
                    }

                    $('#login_errors').html(errorHtml);
                } else {
                    $('#login_errors').html('<p class="error">An error occurred. Please try again.</p>');
                }
            }
        });
    });
});


$(function () {

    $('#register-form').on('submit', function (e) {
        e.preventDefault();


        var formData = $(this).serialize();


        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: formData,
            dataType: 'json',
            success: function (response) {

                window.location.href = response.redirect;


                $('#register-form').remove();
            },
            error: function (xhr) {
                if (xhr.status === 422) {

                    var errors = xhr.responseJSON.errors;
                    var errorHtml = '';

                    for (var key in errors) {
                        errorHtml += '<p class="error">' + errors[key][0] + '</p>';
                    }

                    $('#register_errors').html(errorHtml);
                } else {

                    $('#register_errors').html('<p class="error">Ha ocurrido un error. Inténtalo nuevamente.</p>');
                }
            }
        });
    });
});