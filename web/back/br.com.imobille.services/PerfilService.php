<?php
    class PerfilService{
        private $perfilDao = null;

        public function __construct() {
            $this->perfilDao = new PerfilDao();
        }

        public function createPerfil($perfil) {
            $response = $this->perfilDao->createPerfil($perfil);
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
    }
    
?>