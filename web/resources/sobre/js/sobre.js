window.onpageshow = function() {
    hideLoading();
}

$('document').ready(function() {
    var preferencias = JSON.parse(window.localStorage.getItem("preferencias"));
    $('.navbar-toggle-btn').addClass('navbar-inverted-btn');
    $('.panel-sobre-texto').html(preferencias.nome + ':<br>' + preferencias.sobre);
    $('.panel-sobre-telefone').text('Telefone: '+PhoneFormat.format(preferencias.telefone1));
    $('.panel-sobre-email').text('E-mail: '+preferencias.email);
});