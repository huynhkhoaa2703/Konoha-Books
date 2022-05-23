$(document).ready(function () {
    var modal = $(".modal");
    var btn = $(".modal-click");
    var span = $(".close");
    btn.click(function () {
        modal.show();
    });
    span.click(function () {
        modal.hide();
    });
    $(window).on("click", function (e) {
        if ($(e.target).is(".modal")) {
            modal.hide();
        }
    });
});

var myIndex = 0;
carousel();
function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) {
        myIndex = 1;
    }
    x[myIndex - 1].style.display = "block";
    setTimeout(carousel, 2000);
}

$(document).ready(function () {
    $(window).scroll(function () {
        if ($(this).scrollTop()) {
            $(".backtop").fadeIn();
        } else {
            $(".backtop").fadeOut();
        }
    });
    $(".backtop").click(function () {
        $("html,body").animate({ scrollTop: 0 }, 500);
    });
});
