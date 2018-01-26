var contas = null;

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

function updateContaView(conta) {
    $('#nome-'+conta.id).val(conta.nome);
    $('#foto-'+conta.id).css('background-image',''+conta.foto);
    $('#email-'+conta.id).val(conta.email);
}

function updateConta(contaId) {
    var conta = contas[contaId];

    conta.nome = $('#modal-nome-'+contaId).val();
    conta.foto = $('#modal-foto-'+contaId).css('background-image').replace('url("','').replace('")','');
    conta.foto = conta.foto.substring(conta.foto.indexOf('base64,') + 7);
    conta.email = $('#modal-email-'+contaId).val();
    conta.senha = $('#modal-senha-'+contaId).val();
    conta.telefone = PhoneFormat.unformat($('#modal-telefone-'+contaId).val());
    conta.permissao = $('#modal-permissao-'+contaId).val();

    showLoading();
    
    var url = window.location.protocol + '//' + window.location.host+'/back/br.com.imobille.controller/PerfilController/update.php';
    var data = {
        conta: conta
    };
    var dataType = 'json';
    $.post(url,data,function(response) {
        if(response.status == 'Ok') {
            conta.senha = '<secret>';
            contas[conta.id] = conta;
            updateContaView(conta);
            Messaging.toast(response.message);
        }
        else {
            Messaging.showMessage('erro_updating','Erro na Atualização',response.message);
        }
        hideLoading();
    },dataType).fail(function() {
        hideLoading();
        Messaging.toast('Erro no servidor.<a href="" style="margin-left: 1rem;color: lightblue;">REFAZER</a>',5000);
    });

    $('#modal-box-' + contaId).remove();
}

function modalNovoPerfil() {//TODO
    var conta = contas[contaId];
    var message_id = 'modal-box-' + conta.id;
    var item = '';
    item += '<div class="modal-box" id="' + message_id + '">';
    item += '   <div class="modal-box-background"></div>';
    item += '   <div class="modal-box-content">';
    item += '       <p class="modal-box-title">Atualizar Perfil</p>';
    item += '       <div class="conta" id="modal-conta-' + conta.id + '">';
    item += '           <input type="file" style="display: none;" onchange="showPreview(this);">';
    
    item += '           <div id="modal-foto-' + conta.id + '" class="conta-foto updatable-conta-foto" style="background-image: url(\'data:image/jpeg;base64,' + conta.foto + '\');" onclick="chooseFoto(this);"></div>';
    
    item += '           <label for="modal-nome-' + conta.id + '">Usuário</label>';
    item += '           <input type="text" id="modal-nome-' + conta.id + '" placeholder="Nome de Usuário" value="' + conta.nome + '">';
    
    item += '           <label for="modal-email-' + conta.id + '">E-mail</label>';
    item += '           <input type="text" id="modal-email-' + conta.id + '" placeholder="E-mail que pode ser usado para login" value="' + conta.email + '">';
    
    item += '           <label for="modal-senha-' + conta.id + '">Senha</label>';
    item += '           <input type="password" id="modal-senha-' + conta.id + '" placeholder="Senha de Usuário" value="' + conta.senha + '">';
    
    item += '           <label for="modal-telefone-' + conta.id + '">Telefone</label>';
    item += '           <input type="text" id="modal-telefone-' + conta.id + '" placeholder="Telefone para contato" class="phone-field" onclick="unformatField(this);" onblur="formatField(this);" onkeypress="acceptNumbers(event, 11);" value="' + conta.telefone + '">';
    
    item += '           <label for="modal-criado-em-' + conta.id + '">Criado Em</label>';
    item += '           <input type="text" id="modal-criado-em-' + conta.id + '" value="' + conta.criadoEm + '" readonly>';
    
    item += '           <label for="modal-atualizado-em-' + conta.id + '">Atualizado Em</label>';
    item += '           <input type="text" id="modal-atualizado-em-' + conta.id + '" value="' + conta.atualizadoEm + '" readonly>';
    
    item += '           <label for="modal-acessado-em-' + conta.id + '">Último Acesso</label>';
    item += '           <input type="text" id="modal-acessado-em-' + conta.id + '" value="' + conta.ultimoAcesso + '" readonly>';
    
    item += '           <label for="modal-permissao-' + conta.id + '">Permissão</label>';
    item += '           <select id="modal-permissao-' + conta.id + '">';
    item += '               <option value="' + conta.permissao + '">' + conta.permissao + '</option>';
    item += '               <option value="Administrador">Administrador</option>';
    item += '               <option value="Gerente">Gerente</option>';
    item += '               <option value="Corretor">Corretor</option>';
    item += '               <option value="Marketing">Marketing</option>';
    item += '               <option value="Desativado">Desativado</option>';
    item += '           </select>';
    
    item += '           <button class="modal-box-btn-update" onclick="updateConta(' + conta.id + ');">Atualizar</button>';
    item += '           <button class="modal-box-btn-cancel" onclick="$(\'#' + message_id + '\').remove();">Cancelar</button>';
    item += '       </div>';
    item += '   </div>';
    item += '</div>';

    $('body').append(item);
    $('#modal-box-' + conta.id).fadeIn();
}

function modalUpdatePerfil(contaId) {
    var conta = contas[contaId];
    var message_id = 'modal-box-' + conta.id;
    var item = '';
    item += '<div class="modal-box" id="' + message_id + '">';
    item += '   <div class="modal-box-background"></div>';
    item += '   <div class="modal-box-content">';
    item += '       <p class="modal-box-title">Atualizar Perfil</p>';
    item += '       <div class="conta" id="modal-conta-' + conta.id + '">';
    item += '           <input type="file" style="display: none;" onchange="showPreview(this);">';
    
    item += '           <div id="modal-foto-' + conta.id + '" class="conta-foto updatable-conta-foto" style="background-image: url(\'data:image/jpeg;base64,' + conta.foto + '\');" onclick="chooseFoto(this);"></div>';
    
    item += '           <label for="modal-nome-' + conta.id + '">Usuário</label>';
    item += '           <input type="text" id="modal-nome-' + conta.id + '" placeholder="Nome de Usuário" value="' + conta.nome + '">';
    
    item += '           <label for="modal-email-' + conta.id + '">E-mail</label>';
    item += '           <input type="text" id="modal-email-' + conta.id + '" placeholder="E-mail que pode ser usado para login" value="' + conta.email + '">';
    
    item += '           <label for="modal-senha-' + conta.id + '">Senha</label>';
    item += '           <input type="password" id="modal-senha-' + conta.id + '" placeholder="Senha de Usuário" value="' + conta.senha + '">';
    
    item += '           <label for="modal-telefone-' + conta.id + '">Telefone</label>';
    item += '           <input type="text" id="modal-telefone-' + conta.id + '" placeholder="Telefone para contato" class="phone-field" onclick="unformatField(this);" onblur="formatField(this);" onkeypress="acceptNumbers(event, 11);" value="' + conta.telefone + '">';
    
    item += '           <label for="modal-criado-em-' + conta.id + '">Criado Em</label>';
    item += '           <input type="text" id="modal-criado-em-' + conta.id + '" value="' + conta.criadoEm + '" readonly>';
    
    item += '           <label for="modal-atualizado-em-' + conta.id + '">Atualizado Em</label>';
    item += '           <input type="text" id="modal-atualizado-em-' + conta.id + '" value="' + conta.atualizadoEm + '" readonly>';
    
    item += '           <label for="modal-acessado-em-' + conta.id + '">Último Acesso</label>';
    item += '           <input type="text" id="modal-acessado-em-' + conta.id + '" value="' + conta.ultimoAcesso + '" readonly>';
    
    item += '           <label for="modal-permissao-' + conta.id + '">Permissão</label>';
    item += '           <select id="modal-permissao-' + conta.id + '">';
    item += '               <option value="' + conta.permissao + '">' + conta.permissao + '</option>';
    item += '               <option value="Administrador">Administrador</option>';
    item += '               <option value="Gerente">Gerente</option>';
    item += '               <option value="Corretor">Corretor</option>';
    item += '               <option value="Marketing">Marketing</option>';
    item += '               <option value="Desativado">Desativado</option>';
    item += '           </select>';
    
    item += '           <button class="modal-box-btn-update" onclick="updateConta(' + conta.id + ');">Atualizar</button>';
    item += '           <button class="modal-box-btn-cancel" onclick="$(\'#' + message_id + '\').remove();">Cancelar</button>';
    item += '       </div>';
    item += '   </div>';
    item += '</div>';

    $('body').append(item);
    $('#modal-box-' + conta.id).fadeIn();
}

function appendConta(conta) {
    var item = '';
    item += '<div class="conta" id="conta-' + conta.id + '">';
    item += '    <div id="foto-' + conta.id + '" class="conta-foto" style="background-image: url(\'data:image/jpeg;base64,' + conta.foto + '\');"></div>';
    item += '    <label for="nome-' + conta.id + '">Usuário</label>';
    item += '    <input type="text" id="nome-' + conta.id + '" placeholder="Nome de Usuário" value="' + conta.nome + '" readonly>';
    item += '    <label for="email-' + conta.id + '">E-mail</label>';
    item += '    <input type="text" id="email-' + conta.id + '" placeholder="E-mail que pode ser usado para login" value="' + conta.email + '" readonly>';
    item += '    <a class="conta-controlls-button conta-controlls-edit" onclick="modalUpdatePerfil(' + conta.id + ');"><i class="fa fa-pencil"></i></a>';
    item += '</div>';

    $('.panel-conta').append(item);
}

$('document').ready(function() {
    showLoading();
    
    var url = window.location.protocol + '//' + window.location.host+'/back/br.com.imobille.controller/PerfilController/retrieve.php';
    var data = {};
    var dataType = 'json';
    $.get(url,data,function(response) {
        var lista = response.perfil_list;
        contas = [];
        for(var i = 0;i < lista.length;i++) {
            contas[lista[i].id] = lista[i];
            appendConta(lista[i]);
        }
    },dataType).fail(function() {
        Messaging.toast('Erro no servidor.<a href="" style="margin-left: 1rem;color: lightblue;">REFAZER</a>',5000);
    });
});