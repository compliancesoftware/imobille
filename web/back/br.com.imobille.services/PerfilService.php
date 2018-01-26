<?php
    class PerfilService{
        private $perfilDao = null;

        public function __construct() {
            $this->perfilDao = new PerfilDao();
        }

        public function retrievePerfis() {
            $logado = null;
            $response = null;
            
            if(isset($_SESSION['logado']) && $_SESSION['logado'] != '') {
                $logado = unserialize($_SESSION['logado']);
                $todos = $this->perfilDao->retrievePerfis();
                $response = array();
                foreach($todos as &$perfil) {
                    if($perfil->getPermissao() != 'Cliente') {
                        $perfil->setSenha('<secret>');
                        $response[] = $perfil;
                    }
                }
                if($logado->getPermissao() != 'Administrador') {
                    foreach($response as &$perfil) {
                        if($perfil->getId() == $logado->getId()) {
                            $response = $perfil;
                        }
                    }
                }
            }
            else {
                $response = new ResponseMessage();
                $response->setMessage('Login ou senha inválidos.');
            }
            
            if(is_array($response)) {
                return Jsonify::arrayToJson($response);
            }
            else {
                return $response->serialize();
            }
        }

        public function createPerfil($perfil) {
            $logado = null;
            $response = null;
            
            if(isset($_SESSION['logado']) && $_SESSION['logado'] != '') {
                $logado = unserialize($_SESSION['logado']);
                if($logado->getPermissao() == 'Administrador') {
                    $response = $this->perfilDao->createPerfil($perfil);
                }
                else {
                    $response = new ResponseMessage();
                    $response->setMessage('Permissões insuficientes.');
                }
            }
            else {
                $response = new ResponseMessage();
                $response->setMessage('Login ou senha inválidos.');
            }
            
            return $response->serialize();
        }

        public function updatePerfil($perfil) {
            $logado = null;
            $response = null;
            
            if(isset($_SESSION['logado']) && $_SESSION['logado'] != '') {
                $logado = unserialize($_SESSION['logado']);
                if($logado->getPermissao() == 'Administrador') {
                    $response = $this->perfilDao->updatePerfil($perfil);
                }
                else {
                    if($logado->getId() == $perfil->getId()) {
                        $response = $this->perfilDao->updatePerfil($perfil);
                    }
                    else {
                        $response = new ResponseMessage();
                        $response->setMessage('Permissões insuficientes.');
                    }
                }
            }
            else {
                $response = new ResponseMessage();
                $response->setMessage('Login ou senha inválidos.');
            }
            
            return $response->serialize();
        }

        public function authenticate($login, $senha) {
            $authenticated = $this->perfilDao->authenticate($login, $senha);
            $message = new ResponseMessage();

            if($authenticated != null){
                if(get_class($authenticated) != 'ResponseMessage') {
                    if($authenticated->getPermissao() != 'Desativado') {
                        $_SESSION['logado'] = serialize($authenticated);
                        $message->setMessage('Olá, '.$authenticated->getNome().'!');
                        $message->setStatus(ResponseMessage::STATUS_OK);
                    }
                    else {
                        $message->setMessage('Usuário desativado, favor entrar em contato com Administrador.');
                    }
                }
                else{
                    $message = $authenticated;
                }
            }
            else {
                $message->setMessage('Login ou senha incorretos.');
            }
            
            return $message->serialize();
        }

        public function search($nameOrEmail) {
            $found = $this->perfilDao->search($nameOrEmail);
            
            if($found != null){
                return $found->serialize();
            }
            else {
                $message = new ResponseMessage();
                $message->setMessage('Usuário não encontrado.');
                return $message->serialize();
            }
        }

    }
    
?>