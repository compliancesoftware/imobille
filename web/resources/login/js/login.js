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
        if(response.status == 'Ok') {
            changePage('/admin');
        }
        else {
            hideLoading();
            Messaging.showMessage('login','Erro',response.message);
        }
    },dataType).fail(function() {
        hideLoading();
    });
}

var name = '';
var search = null;

function procuraUsuario() {
    if(search != null) {
        clearTimeout(search);
    }
    search = setTimeout(function() {
        var url = window.location.protocol + '//' + window.location.host+'/back/br.com.imobille.controller/PerfilController/search.php';
        var data = {
            nome: name
        };
        var dataType = 'json';
        $.get(url,data,function(response) {
            if(response != null) {
                if(response.foto != null && response.foto != '') {
                    var foto = 'data:image/png;base64,' + response.foto;
                    $('.user-img').css('background-image','url(' + foto + ')');
                }
                else {
                    $('.user-img').css('background-image','url(../resources/main/images/users/nouser.jpg)');
                }
            }
            else {
                $('.user-img').css('background-image','url(../resources/main/images/users/nouser.jpg)');
            }
        },dataType).fail(function() {
            $('.user-img').css('background-image','url(../resources/main/images/users/nouser.jpg)');
        });
    }, 700);
}

$('document').ready(function() {
    $('#login').keyup(function(event) {
        if(event.key == 'Enter') {
            $('#password').focus();
        }
        else {
            name = $('#login').val();
            procuraUsuario();
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