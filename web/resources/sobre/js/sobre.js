window.onpageshow = function() {
    hideLoading();
}

$('document').ready(function() {
    var preferencias = JSON.parse(window.localStorage.getItem("preferencias"));
    $('.navbar-toggle-btn').addClass('navbar-inverted-btn');
    $('.panel-sobre p').html(preferencias.nome + ':<br>' + preferencias.sobre);
});