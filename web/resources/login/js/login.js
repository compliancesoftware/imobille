$('document').ready(function() {
    $('.btn-login').click(function() {
        $('.btn-login').css('box-shadow','0 1px 1px black');
        $('.btn-login').css('background','linear-gradient(#660205,#9a0a0e)');
        setTimeout(function(){
            $('.btn-login').css('box-shadow','0 1px 10px black');
            $('.btn-login').css('background','linear-gradient(#9a0a0e,#660205)');
            setTimeout(function() {
                showLoading();
            },200);
        }, 200);
    });
});