function login() {
    showLoading();

    var login = $('#login').val();
    var senha = $('#password').val();
    senha = Base64.encode(senha);

    var url = window.location.protocol + '//' + window.location.host+'/back/br.com.imobille.controller/PerfilController/authenticate.php';
    var data = {
        login: login,
        senha: senha
    };
    var dataType = 'json';
    $.post(url,data,function(response) {
        hideLoading();
        if(response.status == 'Ok') {
            Messaging.showMessage('login','Bem vindo',response.message);
            changePage('/admin');
        }
        else {
            Messaging.showMessage('login','Erro',response.message);
        }
    },dataType);
}

var name = '';

$('document').ready(function() {
    $('#login').keyup(function(event) {
        if(event.key == 'Enter') {
            $('#password').focus();
        }
        else {
            name += event.key;
            showLoading();
            //Search user by name and hideLoading();
        }
    });

    $('#password').keyup(function(event) {
        if(event.key == 'Enter') {
            login();
        }
    });

    $('.btn-login').click(function() {
        $('.btn-login').css('box-shadow','0 1px 1px black');
        $('.btn-login').css('background','linear-gradient(#660205,#9a0a0e)');
        setTimeout(function(){
            $('.btn-login').css('box-shadow','0 1px 10px black');
            $('.btn-login').css('background','linear-gradient(#9a0a0e,#660205)');
        }, 200);
    });
});