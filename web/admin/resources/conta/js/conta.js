function chooseFoto(item) {
    $($(item).parent().children()[0]).click();
}

function changeImage(item, image) {
    $(item).css('background-image', image);
}

function showPreview(input) {
    var viewBox = $(input).parent().children()[1];
    var reader = new FileReader();

    reader.onload = function(e) {
        changeImage(viewBox, 'url('+e.target.result+')');
    }

    reader.readAsDataURL(input.files[0]);
}

window.onpageshow = function() {
    hideLoading();
}

function appendConta(conta) {
    var item = '';
    item += '<div class="conta" id="conta-' + conta.id + '">';
    item += '    <div id="foto-' + conta.id + '" class="conta-foto" style="background-image: url(\'data:image/jpeg;base64,' + conta.foto + '\');"></div>';
    item += '    <label for="nome-' + conta.id + '">Usuário</label>';
    item += '    <input type="text" id="nome-' + conta.id + '" placeholder="Nome de Usuário" value="' + conta.nome + '" readonly>';
    item += '    <label for="email-' + conta.id + '">E-mail</label>';
    item += '    <input type="text" id="email-' + conta.id + '" placeholder="E-mail que pode ser usado para login" value="' + conta.email + '" readonly>';
    item += '    <a class="conta-controlls-button conta-controlls-block"><i class="fa fa-ban"></i></a>';
    item += '    <a class="conta-controlls-button conta-controlls-edit"><i class="fa fa-pencil"></i></a>';
    item += '</div>';

    $('.panel-conta').append(item);
}

function setContas(contas) {
    for(var i = 0;i < contas.length;i++) {
        appendConta(contas[i]);
    }
}

$('document').ready(function() {
    showLoading();
    
    var url = window.location.protocol + '//' + window.location.host+'/back/br.com.imobille.controller/PerfilController/retrieve.php';
    var data = {};
    var dataType = 'json';
    $.get(url,data,function(response) {
        setContas(response.perfil_list);
    },dataType).fail(function() {
        Messaging.toast('Erro no servidor.<a href="" style="margin-left: 1rem;color: lightblue;">REFAZER</a>',5000);
    });
});