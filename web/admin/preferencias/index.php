<!DOCTYPE html>
<html lang='pt-BR'>
    <head>
        <?php require '../commons/header.php';?>
        <script src='../resources/preferencias/js/preferencias.js'></script>
        <link rel='stylesheet' href='../resources/preferencias/css/preferencias.css' />
        <title>Imobille Site - Administrador</title>
    </head>
    <body>
        <div class="page">
            <?php require '../commons/navbar.php';?>
            <div class="content">
                <div class="panel-preferencias">
                    <input type="hidden" id="id">

                    <label for="nome">Nome*:</label>
                    <input type="text" id="nome" placeholder="Nome da Empresa" title="É o nome que aparece no site para o cliente.">
                    
                    <label for="cpfCnpj">CPF ou CNPJ*:</label>
                    <input type="number" id="cpfCnpj" placeholder="CPF/CNPJ" title="CPF ou CNPJ da empresa." onclick="removeCpfCnpjFilter(this);" onblur="applyCpfCnpjFilter(this);" onkeyup="cpfCnpjOnKey(event);">
                    
                    <label for="logo" class="logo-image-button">Escolha sua logo:</label>
                    <input type="file" id="logo" style="display: none;" onchange="showPreview('.logo-image',this);">
                    <div class="panel-preferencias-image logo-image" onclick="chooseLogoImage();"></div>
                    
                    <label for="capa" class="cover-image-button">Escolha a capa do site:</label>
                    <input type="file" id="capa" style="display: none;" onchange="showPreview('.cover-image',this);">
                    <div class="panel-preferencias-image cover-image" onclick="chooseCoverImage();"></div>
                    
                    <label for="email">E-mail*:</label>
                    <input type="text" id="email" placeholder="E-mail para contato" title="É o e-mail que aparece no site para o cliente.">
                    
                    <label for="telefone1">Telefone*:</label>
                    <input type="text" id="telefone1" placeholder="Telefone para contato" title="É o telefone que aparece no site e no e-mail para o cliente.">
                    
                    <label for="telefone2">Telefone Opcional:</label>
                    <input type="text" id="telefone2" placeholder="Telefone para contato" title="É o telefone que aparece no e-mail para o cliente.">
                    
                </div>
            </div>
        </div>
    </body>
</html>