$(window).scroll(function() {
    if($(this).scrollTop() > 50)  /*height in pixels when the navbar becomes non opaque*/
    {
        $('.opaque-navbar').addClass('opaque');
    } else {
        $('.opaque-navbar').removeClass('opaque');
    }
});
$(document).ready(function () {
    $(function () {
        $('#mycarousel').carousel({
            interval: 100
        });
    });
});