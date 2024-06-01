$(document).ready(function () {
    // call the function to append products on page load
    "use strict";
    //Menu On Hover

    $('body').on('mouseenter mouseleave', '.nav-item', function (e) {
        if ($(window).width() > 750) {
            var _d = $(e.target).closest('.nav-item'); _d.addClass('show');
            setTimeout(function () {
                _d[_d.is(':hover') ? 'addClass' : 'removeClass']('show');
            }, 1);
        }
    });

    $('.navbar-toggler').click(function () {
        var isExpanded = $(this).attr("aria-expanded");
        if (isExpanded == "false") {
            $('#navbarSupportedContent').slideDown(500);
        } else {
            $('#navbarSupportedContent').slideUp(700);
        }
    })

});