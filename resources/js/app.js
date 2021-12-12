require("./bootstrap");

$("[data-action=dropdown]").on("click", function () {
    var target = $(this).data("target");
    $(target).toggleClass("hidden");
});
$(".js-menuToggle").on("click", function () {
    $("#mobile-menu").toggleClass("hidden");
    $($(this).find("svg")[0]).toggleClass("hidden");
    $($(this).find("svg")[1]).toggleClass("hidden");
});

// close alert
$(".js-closeAlert").on("click", function () {
    var alert = $(this).parents("#generalAlert");
    alert.hide();
});

if (!$("#generalAlert").hasClass("alert-important")) {
    setInterval(() => {
        $("#generalAlert").fadeOut();
    }, 3000);
}

$("[data-action=modal]").on("click", function () {
    console.log($(this).data("target"));
    var target = $(this).data("target");
    $(target).toggleClass("hidden");
});
