<!DOCTYPE html>
<html lang='pt-BR'>
    <head>
        <?php require '../commons/header.php';?>
        <title>Cadastro</title>
        <link rel='stylesheet' type='text/css' href='../resources/cadastro/css/cadastro.css'/>
        <script type='text/javascript' src='../resources/cadastro/js/cadastro.js'></script>
    </head>
    <body>
        <div class="page">
            <?php require '../commons/navbar.php';?>
            <div class="content">
                <div class="cadastro">
                    <div class="cadastro-link" onclick="changePage('/cadastrarMeuImovel');">
                        <p>Cadastrar meu imóvel</p>
                        <i class="fa fa-chevron-right"></i>
                    </div>
                    <div class="separador"></div>
                    <div class="cadastro-link" onclick="changePage('/procurarMeuImovel');">
                        <p>Procurar meu imóvel</p>
                        <i class="fa fa-chevron-right"></i>
                    </div>
                    <div class="separador"></div>
                </div>
            </div>
        </div>
    </body>
</html>