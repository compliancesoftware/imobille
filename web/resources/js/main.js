function isMobile() {
    if($('body').width() > 768) {return false};
    return true;
}

function togglePelicula() {
    if($('.pelicula').css('display') == 'none') {
        $('.pelicula').fadeIn();
    }
    else {
        $('.pelicula').fadeOut();
    }
}

function toggleNavBar() {
    $('.navbar').toggle('slide');
    togglePelicula();
}

function changePage(page) {
    window.open('http://'+window.location.host+page,'_self');
}

function appendToContatos(contatos) {
    $('.navbar .contatos').html('');
    $('.navbar .contatos').text('');

    contatos.forEach(contato => {
        var item = '';
        if(contato.nome != 'blogger' && contato.nome != 'sexlog') {
            if(contato.nome == 'email') {
                contato.nome = 'envelope';
                contato.link = 'mailto:'+contato.link;
            }
            item += '<a href="'+contato.link+'" class="'+contato.nome+'">';

            var hasSquare = '';
            if(contato.nome == 'facebook' || contato.nome == 'twitter') {
                hasSquare = '-square';
            }
            else if(contato.nome == 'twitter') {
                hasSquare = '-square';
            }

            item += '   <i class="fa fa-'+contato.nome+hasSquare+'" aria-hidden="true"></i>';
            item += '</a>';
        }
        else {
            item += '<div onclick="window.location.href = \''+contato.link+'\'" class="'+contato.nome+'">';
            item += '</div>';
        }
        $('.navbar .contatos').append(item);
    });
}

function fillContatos() {
    var contatos = [];

    var contato1 = new Contato();
    contato1.id = 1;
    contato1.nome = 'facebook';
    contato1.link = 'https://www.facebook.com';
    contatos.push(contato1);

    var contato2 = new Contato();
    contato2.id = 2;
    contato2.nome = 'twitter';
    contato2.link = 'https://www.twitter.com';
    contatos.push(contato2);

    var contato3 = new Contato();
    contato3.id = 3;
    contato3.nome = 'instagram';
    contato3.link = 'https://www.instagram.com';
    contatos.push(contato3);

    var contato4 = new Contato();
    contato4.id = 4;
    contato4.nome = 'whatsapp';
    contato4.link = 'https://api.whatsapp.com/send?1=pt_BR&phone=5581986613538';
    contatos.push(contato4);

    var contato5 = new Contato();
    contato5.id = 5;
    contato5.nome = 'blogger';
    contato5.link = 'https://www.blogger.com/about/?r=1-null_user';
    contatos.push(contato5);

    var contato6 = new Contato();
    contato6.id = 6;
    contato6.nome = 'email';
    contato6.link = 'douglasf.filho@gmail.com';
    contatos.push(contato6);

    appendToContatos(contatos);
}

function activeNavItem(item) {
    $('.nav-item').removeClass('nav-item-active');
    $(item).addClass('nav-item-active');
}

function  clickLancamentos(item) {
    activeNavItem(item);
    toggleNavBar();
    changePage('#lancamentos');
}

function  clickUsados(item) {
    activeNavItem(item);
    toggleNavBar();
    changePage('#usados');
}

function  clickAluguel(item) {
    activeNavItem(item);
    toggleNavBar();
    changePage('#aluguel');
}

function  clickContato() {
    if($('.contatos').css('display') == 'none') {
        $('.contatos').slideDown();
    }
    else {
        $('.contatos').slideUp();
    }
}

$('document').ready(function(){
    $('.pelicula').click(function(){
        if($('.pelicula').css('display') != 'none') {
            toggleNavBar();
        }
    })

    $(window).scroll(function(){

        var transformation = (window.scrollY/3);
        var opacity = (176 - window.scrollY)/176;

        $('.header').css('transform','translateY('+transformation+'px)');
        $('.cover').css('transform','translateY('+transformation+'px)');

        $('.header').css('opacity',''+opacity);
        $('.cover').css('opacity',''+opacity);

        if(window.scrollY >= 179) {
            $('.navbar-toggle-btn').css('background-color','#9d0a0e');
            $('.navbar-toggle-btn').css('color','white');
        }
        else {
            $('.navbar-toggle-btn').css('background-color','transparent');
            $('.navbar-toggle-btn').css('color','#9d0a0e');
        }
    });

    fillContatos();

    if(window.location.hash == '') {
        $('#link-home').addClass('nav-item-active');
    }
    else {
        var item = '#link-'+window.location.hash.substring(1);
        activeNavItem(item);
    }
});