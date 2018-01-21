function active(item) {
    if(showingOpcoes()) {
        toggleOpcoes();
    }
    $('.nav-item').removeClass('nav-item-active');
    $(item).addClass('nav-item-active');
}

function showingOpcoes() {
    return $('.nav-item.opcoes').hasClass('nav-item-active');
}

function toggleOpcoes() {
    if(showingOpcoes()) {
        $('.pelicula').fadeOut();
        $('.popup').toggle('fold');
        $('.nav-item.opcoes').removeClass('nav-item-active');
    }
    else {
        setTimeout(function() {
            $('.nav-item.opcoes').addClass('nav-item-active');
            $('.pelicula').fadeIn();
            $('.popup').toggle('fold');
        },100);
    }
}

$('document').ready(function() {
    var page = window.location.href;
    if(page.indexOf('/home') > -1) {
        active('.nav-item.home');
    }
    else {
        $('.nav-item.home i').removeClass('fa-home').addClass('fa-chevron-left');
        $('.nav-item.home').click(function(){
            changePage('/admin/home');
        });
        $('.nav-item.imoveis').click(function(){
            changePage('/admin/home#imoveis');
        });
        $('.nav-item.clientes').click(function(){
            changePage('/admin/home#clientes');
        });
        $('.nav-item.contas').click(function(){
            changePage('/admin/home#contas');
        });
    }
    var hash = window.location.hash;
    if(hash != '') {
        active('.nav-item.'+hash.replace('#',''));
    }
});