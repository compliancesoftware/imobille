            <script type='text/javascript' src='../resources/main/js/models/contato.js'></script>
            <script type='text/javascript' src='../resources/navbar/js/navbar.js'></script>

            <link rel='stylesheet' href='../resources/navbar/css/navbar.css' />
            
            <div class="navbar-toggle-btn">
                <i class="fa fa-navicon" aria-hidden="true" onclick="toggleNavBar();"></i>
                <i class="fa fa-user-circle login-btn" aria-hidden="true" onclick="changePage('/login');"></i>
            </div>
            <div class="navbar">
                <div class="nav-item" id="link-home" onclick="changePage('');">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <p>Home</p>
                </div>
                <div class="nav-item" id="link-lancamentos" onclick="clickNavItem(this);">
                    <i class="fa fa-building-o" aria-hidden="true"></i>
                    <p>Lançamentos</p>
                </div>
                <div class="nav-item" id="link-usados" onclick="clickNavItem(this);">
                    <i class="fa fa-handshake-o" aria-hidden="true"></i>
                    <p>Usados</p>
                </div>
                <div class="nav-item" id="link-aluguel"  onclick="clickNavItem(this);">
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
                <div class="nav-item nav-item-sobre" id="link-sobre" onclick="changePage('/sobre');">
                    <i class="fa fa-question" aria-hidden="true"></i>
                    <p>Sobre nós</p>
                </div>
                <div class="nav-footer">
                    <p>by:</p>
                    <a href="http://compliancehome.herokuapp.com/">Compliance Software&reg;</a>
                </div>
            </div>