$(document).ready(function () {
    $('.tab_url').click(function () {
        var href = $(this).children().attr('href');
        window.location.href = href;
    })
})