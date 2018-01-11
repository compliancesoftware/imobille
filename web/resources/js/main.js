var canMove = false;

function monetize(number) {
    var number = number.toFixed(2).split('.');
    number[0] = "R$ " + number[0].split(/(?=(?:...)*$)/).join('.');
    return number.join(',');
}

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

function moveToLocation(location) {
    if(canMove) {
        var height = $(location).offset().top - 40;
        $('html, body').animate({scrollTop: height}, 1200);
    }
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

function applySlicker() {
    $('.box').slick({
        dots: true,
        arrows: true,
        infinite: true,
        speed: 1000,
        slidesToShow: 3,
        slidesToScroll: 3,
        variableWidth: true,
        autoplay: true,
        autoplaySpeed: 3000,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
              dots: true,
              centerMode: true
            }
          },
          {
            breakpoint: 375,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              infinite: true,
              arrows: false,
              dots: true
            }
          }
        ]
    });
}

function fillLancamentos() {
    var boxItem = '';
    boxItem += '<div class="box-item">';
    boxItem += '    <p class="box-item-title">{nome}</p>';
    boxItem += '    <div class="box-item-capa" style="background-image: url({background-image});">';
    boxItem += '        <p class="box-item-preco">{valor}</p>';
    boxItem += '    </div>';
    boxItem += '    <p class="box-item-localizacao"><i class="fa fa-map-marker to-left" aria-hidden="true"></i>{endereco}</p>';
    boxItem += '</div>';

    var url = window.location.protocol + '//' + window.location.host+'/back/br.com.imobille.controller/ImovelController/listaLancamentos.php';
    var data = {};
    var dataType = 'json';
    $.get(url,data,function(response) {
        var imoveis = response.imovel_list;
        imoveis.forEach(function(imovel) {
            boxItem = boxItem.replace('{nome}',imovel.construcao.nome);
            boxItem = boxItem.replace('{background-image}',imovel.construcao.capa);
            var preco = monetize(imovel.preco);
            boxItem = boxItem.replace('{valor}',preco);
            var endereco = imovel.construcao.endereco;
            var strEndereco = endereco.bairro + ', ' + endereco.cidade + '-' + endereco.estado;
            boxItem = boxItem.replace('{endereco}',strEndereco);
            $('.box#lancamentos').append(boxItem);
        });
    },dataType);

    
}

function activeNavItem(item) {
    $('.nav-item').removeClass('nav-item-active');
    $(item).addClass('nav-item-active');
}

function  clickLancamentos(item) {
    activeNavItem(item);
    toggleNavBar();
    moveToLocation('#lancamentos');
    changePage('#lancamentos');
}

function  clickUsados(item) {
    activeNavItem(item);
    toggleNavBar();
    moveToLocation('#usados');
    changePage('#usados');
}

function  clickAluguel(item) {
    activeNavItem(item);
    toggleNavBar();
    moveToLocation('#aluguel');
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

function showLoading() {
    $(".loading").show();
}

function hideLoading() {
    $(".loading").hide();
}

window.onpageshow = function() {
    setTimeout(function() {
        applySlicker();
        setTimeout(function() {
            $('button.slick-prev').html('<i class="fa fa-chevron-circle-left" aria-hidden="true"></i>');
            $('button.slick-next').html('<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>');

            hideLoading();
        }, 1000);
    }, 1000);

    canMove = true;
}

$('document').ready(function(){
    showLoading();
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
        moveToLocation(window.location.hash);
    }

    fillLancamentos();
});