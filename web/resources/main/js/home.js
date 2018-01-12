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

function appendToLancamentos(lancamentos) {
    var boxItem = '';
    boxItem += '<div class="box-item">';
    boxItem += '    <p class="box-item-title">{nome}</p>';
    boxItem += '    <div class="box-item-capa" style="background-image: url({background-image});">';
    boxItem += '        <p class="box-item-preco">{valor}</p>';
    boxItem += '    </div>';
    boxItem += '    <p class="box-item-localizacao"><i class="fa fa-map-marker to-left" aria-hidden="true"></i>{endereco}</p>';
    boxItem += '</div>';

    lancamentos.forEach(function(imovel) {
        boxItem = boxItem.replace('{nome}',imovel.construcao.nome);
        boxItem = boxItem.replace('{background-image}',imovel.construcao.capa);
        var preco = monetize(imovel.preco);
        boxItem = boxItem.replace('{valor}',preco);
        var endereco = imovel.construcao.endereco;
        var strEndereco = endereco.bairro + ', ' + endereco.cidade + '-' + endereco.estado;
        boxItem = boxItem.replace('{endereco}',strEndereco);
        $('.box#lancamentos').append(boxItem);
    });
}

function fillLancamentos() {
    var url = window.location.protocol + '//' + window.location.host+'/back/br.com.imobille.controller/ImovelController/listaLancamentos.php';
    var data = {};
    var dataType = 'json';
    $.get(url,data,function(response) {
        var imoveis = response.imovel_list;
        appendToLancamentos(imoveis);
    },dataType);
}

window.onpageshow = function() {
    setTimeout(function() {
        applySlicker();
        setTimeout(function() {
            $('button.slick-prev').html('<i class="fa fa-chevron-circle-left" aria-hidden="true"></i>');
            $('button.slick-next').html('<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>');

            hideLoading();
            canMove = true;
        }, 1000);
    }, 1000);
}

$('document').ready(function(){
    canMove = false;
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

    fillLancamentos();
});