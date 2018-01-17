function active(item) {
    if(showingOpcoes()) {
        toggleOpcoes();
    }
    $('.nav-item').removeClass('nav-item-active');
    $(item).addClass('nav-item-active');
}

function appendOpcoesHome() {
    var opcoes = '';
    opcoes += '<div class="pelicula" onclick="toggleOpcoes();"></div>';
    opcoes += '<div class="popup" id="popup-opcoes">';
    opcoes += '    <div class="popup-content">';
    opcoes += '        <p><i class="fa fa-building-o" aria-hidden="true"></i>Construtoras</p>';
    opcoes += '        <p><i class="fa fa-cogs" aria-hidden="true"></i>Preferências</p>';
    opcoes += '        <div class="popup-content-separator"></div>';
    opcoes += '        <p onclick="changePage(\'/logout\');"><i class="fa fa-power-off" aria-hidden="true"></i>Sair</p>';
    opcoes += '    </div>';
    opcoes += '</div>';
    $('body').append(opcoes);
}

function showingOpcoes() {
    return $('.nav-item.opcoes').hasClass('nav-item-active');
}

function toggleOpcoes() {
    if(showingOpcoes()) {
        $('.pelicula').fadeOut();
        $('.popup').toggle('fold');
        $('.nav-item.opcoes').removeClass('nav-item-active');
        setTimeout(function() {
            $('.pelicula').remove();
            $('.popup').remove();
        },600);
    }
    else {
        appendOpcoesHome();
        setTimeout(function() {
            $('.nav-item.opcoes').addClass('nav-item-active');
            $('.pelicula').fadeIn();
            $('.popup').toggle('fold');
        },100);
    }
}

$('document').ready(function() {
    active('.nav-item.home');
});