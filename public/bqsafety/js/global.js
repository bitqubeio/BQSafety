$(document).ready(function () {
    $('#bqsafety-loader').fadeOut();
});

$(function () {
    /*----------------------------------
     Expande sidebar left
     -----------------------------------*/
    $(".sidebar-button").click(function () {
        $("#navbar-top").toggleClass("expanded");
        $("#main").toggleClass("expanded");
        $(".sidebar-left").toggleClass("expandedd");
        $(this).find("i").toggleClass('fa-navicon fa-arrow-left');
    });
    $(".close-sidebar").click(function () {
        $("#navbar-top").removeClass("expanded");
        $(".sidebar-left").removeClass("expandedd");
        $("#main").removeClass("expanded");
        $(".sidebar-button").find("i").toggleClass('fa-navicon fa-arrow-left');
    });
});

