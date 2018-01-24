function chooseLogoImage() {
    $('#logo').click();
}

function chooseCoverImage() {
    $('#capa').click();
}

function changeImage(item, image) {
    $(item).css('background-image', image);
}

function showPreview(viewBox, logoInput) {
    var reader = new FileReader();

    reader.onload = function(e) {
        changeImage(viewBox, 'url('+e.target.result+')');
    }

    reader.readAsDataURL(logoInput.files[0]);
}

window.onpageshow = function() {
    hideLoading();
}

function requestPreferencesToUpdate(preferencias) {
    var url = window.location.protocol + '//' + window.location.host+'/back/br.com.imobille.controller/PreferenciasController/update.php';
    var data = {preferencias: preferencias};
    var dataType = 'json';
    $.post(url,data,function(response) {
        console.log(response);
        Messaging.toast(response.message);
        if(response.status == 'Ok') {
            window.localStorage.setItem("preferencias",JSON.stringify(preferencias));
        }
    },dataType).fail(function() {
        Messaging.toast('Erro na operação.');
    });
}

function updatePreferences() {
    var preferencias = JSON.parse(window.localStorage.getItem("preferencias"));
    preferencias.id = $('#id').val();
    preferencias.nome = $('#nome').val();
    preferencias.cpfCnpj = CpfCnpjFormat.unformat($('#cpfCnpj').val());
    preferencias.logo = $('.panel-preferencias-image.logo-image').css('background-image').replace('url("','').replace('")','');
    preferencias.logo = preferencias.logo.substring(preferencias.logo.indexOf('base64,') + 7);
    preferencias.capa = $('.panel-preferencias-image.cover-image').css('background-image').replace('url("','').replace('")','');
    preferencias.capa = preferencias.capa.substring(preferencias.capa.indexOf('base64,') + 7);
    preferencias.email = $('#email').val();
    preferencias.telefone1 = PhoneFormat.format($('#telefone1').val());
    preferencias.telefone2 = PhoneFormat.format($('#telefone2').val());
    preferencias.blog = $('#blog').val();
    preferencias.whatsapp = $('#whatsapp').val();
    preferencias.instagram = $('#instagram').val();
    preferencias.twitter = $('#twitter').val();
    preferencias.facebook = $('#facebook').val();
    preferencias.sobre = $('#sobre').val();

    requestPreferencesToUpdate(preferencias);
}

function setPreferencias(preferencias) {
    window.localStorage.setItem("preferencias",JSON.stringify(preferencias));
    $('#id').val(preferencias.id);
    $('#nome').val(preferencias.nome);
    $('#cpfCnpj').val(CpfCnpjFormat.format(preferencias.cpfCnpj));
    preferencias.logo = 'data:image/png;base64,'+preferencias.logo;
    $('.panel-preferencias-image.logo-image').css('background-image','url(' + preferencias.logo + ')');
    preferencias.capa = 'data:image/png;base64,'+preferencias.capa;
    $('.panel-preferencias-image.cover-image').css('background-image','url(' + preferencias.capa + ')');
    $('#email').val(preferencias.email);
    $('#telefone1').val(PhoneFormat.format(preferencias.telefone1));
    $('#telefone2').val(PhoneFormat.format(preferencias.telefone2));
    $('#blog').val(preferencias.blog);
    $('#whatsapp').val(preferencias.whatsapp);
    $('#instagram').val(preferencias.instagram);
    $('#twitter').val(preferencias.twitter);
    $('#facebook').val(preferencias.facebook);
    $('#sobre').val(preferencias.sobre);
}

$('document').ready(function() {
    var url = window.location.protocol + '//' + window.location.host+'/back/br.com.imobille.controller/PreferenciasController/retrieve.php';
    var data = {};
    var dataType = 'json';
    $.get(url,data,function(response) {
        setPreferencias(response);
    },dataType);
});