$(document).ready(function(){
    $('.click_del').click(function(){
        window.href = $(this).attr('data-href');
        $('.del_yes').attr('href',href);
    })


})