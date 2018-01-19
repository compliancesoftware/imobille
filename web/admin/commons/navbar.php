            <script type='text/javascript' src='../resources/navbar/js/navbar.js'></script>

            <link rel='stylesheet' href='../resources/navbar/css/navbar.css' />
            
            <div class="navbar">
                <div class="nav-item home" onclick="active(this)">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <p>Home</p>
                </div>
                <div class="nav-item imoveis" onclick="active(this);">
                    <i class="fa fa-building-o" aria-hidden="true"></i>
                    <p>Imóveis</p>
                </div>
                <div class="nav-item clientes" onclick="active(this);">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <p>Clientes</p>
                </div>
                <div class="nav-item contas" onclick="active(this);">
                    <i class="fa fa-credit-card" aria-hidden="true"></i>
                    <p>Contas</p>
                </div>
                <div class="nav-item opcoes" onclick="toggleOpcoes();">
                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                    <p>Opções</p>
                </div>
            </div>
            <div class="pelicula" onclick="toggleOpcoes();"></div>
            <div class="popup" id="popup-opcoes">
                <div class="popup-content">
                    <p onclick="changePage('/admin/construtoras');"><i class="fa fa-building-o" aria-hidden="true"></i>Construtoras</p>
                    <p onclick="changePage('/admin/preferencias');"><i class="fa fa-cogs" aria-hidden="true"></i>Preferências</p>
                    <div class="popup-content-separator"></div>
                    <p onclick="changePage('/logout');"><i class="fa fa-power-off" aria-hidden="true"></i>Sair</p>
                </div>
            </div>