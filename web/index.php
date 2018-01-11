<!DOCTYPE html>
<html lang='pt-BR'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' />
        <meta http-equiv='X-UA-Compatible' content='ie=edge'>

        <link rel="apple-touch-icon" sizes="57x57" href="resources/icone/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="resources/icone/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="resources/icone/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="resources/icone/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="resources/icone/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="resources/icone/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="resources/icone/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="resources/icone/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="resources/icone/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="resources/icone/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="resources/icone/icon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="resources/icone/icon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="resources/icone/icon-16x16.png">
        <link rel="manifest" href="resources/icone/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="resources/icone/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">

        <title>Imobille Site</title>

        <link rel='stylesheet' href='resources/js/jquery-ui.structure.css' />
        <link rel='stylesheet' href='resources/js/jquery-ui.theme.css' />
        <link rel='stylesheet' href='resources/js/jquery-ui.css' />
        <link rel='stylesheet' type='text/css' href='resources/js/slick/slick.css'/>
        <link rel='stylesheet' type='text/css' href='resources/js/slick/slick-theme.css'/>
        <link rel='stylesheet' type='text/css' href='resources/css/main.css'/>
        <link rel='stylesheet' type='text/css' href='resources/css/fontawesome/css/font-awesome.css'/>


        <script src='resources/js/jquery.js'></script>
        <script src='resources/js/jquery-ui.js'></script>
        <script type='text/javascript' src='resources/js/slick/slick.js'></script>
        <script type='text/javascript' src='resources/js/models/contato.js'></script>
        <script type='text/javascript' src='resources/js/main.js'></script>

    </head>
    <body>
        <div class="page">
            <div class="navbar-toggle-btn">
                <i class="fa fa-navicon" aria-hidden="true" onclick="toggleNavBar();"></i>
                <i class="fa fa-user-circle login-btn" aria-hidden="true" onclick="changePage('/login');"></i>
            </div>
            <div class="navbar">
                <div class="nav-item" id="link-home" onclick="changePage('');">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <p>Home</p>
                </div>
                <div class="nav-item" id="link-lancamentos" onclick="clickLancamentos(this);">
                    <i class="fa fa-building-o" aria-hidden="true"></i>
                    <p>Lançamentos</p>
                </div>
                <div class="nav-item" id="link-usados" onclick="clickUsados(this);">
                    <i class="fa fa-handshake-o" aria-hidden="true"></i>
                    <p>Usados</p>
                </div>
                <div class="nav-item" id="link-aluguel"  onclick="clickAluguel(this);">
                    <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                    <p>Aluguel</p>
                </div>
                <div class="nav-item" id="link-cadastro" onclick="changePage('/cadastro');">
                    <i class="fa fa-bell-o" aria-hidden="true"></i>
                    <p>Cadastre-se</p>
                </div>
                <div class="nav-item" id="link-contato" onclick="clickContato();">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <p>Entre em contato</p>
                </div>
                <div class="contatos"></div>
                <div class="nav-item" id="link-sobre" onclick="changePage('/sobre');">
                    <i class="fa fa-question" aria-hidden="true"></i>
                    <p>Sobre nós</p>
                </div>
                <div class="nav-footer">
                    <p>by:</p>
                    <a href="http://compliancehome.herokuapp.com/">Compliance Software&reg;</a>
                </div>
            </div>
            <div class="content">
                <div class="pelicula" onclick="toggleNavBar();"></div>
                <div class="loading">
                    <i class="fa fa-spin fa-circle-o-notch" aria-hidden="true"></i>
                </div>
                <div class="header">
                    <div class="header-img" style="background-image: url(resources/images/logo/logo.jpg);"></div>
                    <p>Imobille WebApp</p>
                </div>
                <div class="cover" style="background-image: url(resources/images/cover/cover.png);"></div>
                <div class="content-render">
                    <p class="box-title">Lançamentos</p>
                    <div id="lancamentos" class="box"></div>
                    <p class="box-title">Usados</p>
                    <div id="usados" class="box">
                        
                    </div>
                    <p class="box-title">Aluguel</p>
                    <div id="aluguel" class="box">
                        
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>