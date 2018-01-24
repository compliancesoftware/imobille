function togglePelicula() {
    if($('.pelicula').css('display') == undefined) {
        var pelicula = '<div class="pelicula" onclick="toggleNavBar();"></div>';
        $('body').append(pelicula);
        $('.pelicula').fadeIn();
    }
    else {
        $('.pelicula').fadeOut();
        $('.pelicula').remove();
    }
}

function toggleNavBar() {
    $('.navbar').toggle('slide');
    togglePelicula();
}

function appendToContatos(contatos) {
    $('.navbar .contatos').html('');
    $('.navbar .contatos').text('');

    for(var i = 0;i < contatos.length;i++) {
        var contato = contatos[i];
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
    }
}

function fillContatos() {
    var preferencias = JSON.parse(window.localStorage.getItem("preferencias"));
    
    var contatos = [];

    if(preferencias.facebook != null && preferencias.facebook != '') {
        var facebook = new Contato();
        facebook.id = 1;
        facebook.nome = 'facebook';
        facebook.link = 'https://www.facebook.com/'+preferencias.facebook;
        contatos.push(facebook);
    }

    if(preferencias.twitter != null && preferencias.twitter != '') {
        var twitter = new Contato();
        twitter.id = 2;
        twitter.nome = 'twitter';
        twitter.link = 'https://twitter.com/'+preferencias.twitter;
        contatos.push(twitter);
    }

    if(preferencias.instagram != null && preferencias.instagram != '') {
        var instagram = new Contato();
        instagram.id = 3;
        instagram.nome = 'instagram';
        instagram.link = 'https://www.instagram.com/'+preferencias.instagram;
        contatos.push(instagram);
    }

    if(preferencias.whatsapp != null && preferencias.whatsapp != '') {
        var whatsapp = new Contato();
        whatsapp.id = 3;
        whatsapp.nome = 'whatsapp';
        whatsapp.link = 'https://api.whatsapp.com/send?1=pt_BR&phone=55'+preferencias.whatsapp;
        contatos.push(whatsapp);
    }

    if(preferencias.blog != null && preferencias.blog != '') {
        var blogger = new Contato();
        blogger.id = 5;
        blogger.nome = 'blogger';
        blogger.link = 'https://'+preferencias.blog+'.blogspot.com.br/';
        contatos.push(blogger);
    }

    if(preferencias.email != null && preferencias.email != '') {
        var email = new Contato();
        email.id = 6;
        email.nome = 'email';
        email.link = 'douglasf.filho@gmail.com';
        contatos.push(email);
    }

    appendToContatos(contatos);
}

function clickNavItem(item) {
    var itemId = '#'+$(item).attr('id');
    activeNavItem(itemId);
    toggleNavBar();
    var tag = itemId.replace('#link-','');
    moveToLocation('#'+ tag);
    if(window.location.href.indexOf('/home') < 0) {
        changePage('/home?tag=' + tag);
    }
}

function externalClickNavItem(tag) {
    activeNavItem('#link-' + tag.replace('#',''));
    moveToLocation(tag);
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
    fillContatos();
});