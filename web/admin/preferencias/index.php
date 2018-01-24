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
                    <input type="text" id="cpfCnpj" class="cpf-cnpj-field" placeholder="CPF/CNPJ" title="CPF ou CNPJ da empresa." onclick="unformatField(this);" onblur="formatField(this);" onkeypress="acceptNumbers(event, 14);">
                    
                    <label for="logo">Escolha sua logo: (Dê preferencia a imagem 280px X 280px centralizada)</label>
                    <input type="file" id="logo" style="display: none;" onchange="showPreview('.logo-image',this);">
                    <div class="panel-preferencias-image logo-image" onclick="chooseLogoImage();"></div>
                    
                    <label for="capa">Escolha a capa do site: (Dê preferencia a imagem 530px X 310px)</label>
                    <input type="file" id="capa" style="display: none;" onchange="showPreview('.cover-image',this);">
                    <div class="panel-preferencias-image cover-image" onclick="chooseCoverImage();"></div>
                    
                    <label for="email">E-mail*:</label>
                    <input type="text" id="email" placeholder="E-mail para contato" title="É o e-mail que aparece no site para o cliente." onclick="this.select();">
                    
                    <label for="telefone1">Telefone*:</label>
                    <input type="text" id="telefone1" class="phone-field" placeholder="Telefone para contato" title="É o telefone que aparece no site e no e-mail para o cliente." onclick="unformatField(this);" onblur="formatField(this);" onkeypress="acceptNumbers(event, 11);">
                    
                    <label for="telefone2">Telefone Opcional:</label>
                    <input type="text" id="telefone2" class="phone-field" placeholder="Telefone para contato" title="É o telefone que aparece no e-mail para o cliente." onclick="unformatField(this);" onblur="formatField(this);" onkeypress="acceptNumbers(event, 11);">
                    
                    <label for="blog">Seu Usuário Blogspot:</label>
                    <input type="text" id="blog" placeholder="Apenas o usuário sem '.blogspot.com.br'" title="Aparece como http://<seu_usuario_blogspot>.blogspot.com.br">
                    
                    <label for="whatsapp">Seu Número de WhatsApp:</label>
                    <input type="text" id="whatsapp" class="phone-field" placeholder="Deixe vazio para usar rotatividade de corretores" title="Número que o cliente irá contactar." onclick="unformatField(this);" onblur="formatField(this);" onkeypress="acceptNumbers(event, 11);">
                    
                    <label for="instagram">Seu Usuário Instagram:</label>
                    <input type="text" id="instagram" placeholder="Apenas o usuário sem 'https://www.instagram.com/'" title="Aparece como https://www.instagram.com/<seu_usuario_instagram>">
                    
                    <label for="twitter">Seu Usuário Twitter:</label>
                    <input type="text" id="twitter" placeholder="Apenas o usuário sem 'https://twitter.com/'" title="Aparece como https://twitter.com/<seu_usuario_twitter>">
                    
                    <label for="facebook">Seu Usuário Facebook:</label>
                    <input type="text" id="facebook" placeholder="Apenas o usuário sem 'https://www.facebook.com/'" title="Aparece como https://www.facebook.com/<seu_usuario_facebook>">
                    
                    <label for="sobre">Sobre a empresa:</label>
                    <textarea rows="40" id="sobre" placeholder="Conte-nos sua história" title="Aparece na página 'Quem somos nós'>"></textarea>
                    
                    <button class="panel-preferencias-submit" onclick="updatePreferences();">Atualizar</button>
                </div>
            </div>
        </div>
    </body>
</html>