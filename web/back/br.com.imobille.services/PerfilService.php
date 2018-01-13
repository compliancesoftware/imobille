<?php
    class PerfilService{
        private $perfilDao = null;

        public function __construct() {
            $this->perfilDao = new PerfilDao();
        }

        public function createPerfil($perfil, $logado) {
            $logado = null;
            $response = null;
            
            if(isset($_SESSION['logado']) && $_SESSION['logado'] != '') {
                $logado = unserialize($_SESSION['logado']);
                $response = $this->perfilDao->createPerfil($perfil);
            }
            else {
                $response = new ResponseMessage();
                $response->setMessage('Login ou senha inválidos.');
            }
            
            return $response->serialize();
        }

        public function updatePerfil($perfil) {
            $response = $this->perfilDao->updatePerfil($perfil);
            return $response->serialize();
        }

        public function deletePerfil($perfil) {
            $response = $this->perfilDao->deletePerfil($perfil);
            return $response->serialize();
        }

        public function authenticate($login, $senha) {
            $authenticated = $this->perfilDao->authenticate($login, $senha);
            $message = new ResponseMessage();

            if($authenticated != null){
                if(get_class($authenticated) != 'ResponseMessage') {
                    $_SESSION['logado'] = serialize($authenticated);
                    $message->setMessage('Olá, '.$authenticated->getNome().'!');
                    $message->setStatus(ResponseMessage::STATUS_OK);
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