window.onpageshow = function() {
    hideLoading();
}

$('document').ready(function() {
    var preferencias = JSON.parse(window.localStorage.getItem("preferencias"));
    $('.navbar-toggle-btn').addClass('navbar-inverted-btn');
    $('.panel-sobre-titulo').text(preferencias.nome);
    $('.panel-sobre-texto').text(preferencias.sobre);
    $('.panel-sobre-telefone').text('Telefone: '+PhoneFormat.format(preferencias.telefone1));
    $('.panel-sobre-email').text('E-mail: '+preferencias.email);
});