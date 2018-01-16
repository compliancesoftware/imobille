function logout() {
    var url = window.location.protocol + '//' + window.location.host+'/back/br.com.imobille.controller/PerfilController/logout.php';
    var data = {};
    var dataType = 'json';
    $.get(url,data,function(response) {
        if(response.status == 'Ok') {
            changePage('/login');
        }
        else {
            changePage('/admin');
        }
    },dataType);
}