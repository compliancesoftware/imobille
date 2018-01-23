<?php
    class PreferenciasService{
        private $preferenciasDao = null;

        public function __construct() {
            $this->preferenciasDao = new PreferenciasDao();
        }

        public function createPreferencias($preferencias) {
            $response = $this->preferenciasDao->createPreferencias($preferencias);
            return $response->serialize();
        }

        public function updatePreferencias($preferencias) {
            if(isset($_SESSION['logado']) && $_SESSION['logado'] != '') {
                $response = $this->preferenciasDao->updatePreferencias($preferencias);
            }
            else {
                $response = new ResponseMessage();
                $response->setMessage('Login ou senha inválidos.');
            }
            
            return $response->serialize();
        }

        public function getPreferencias() {
            $preferencias = $this->preferenciasDao->getPreferencias();
            $response = $preferencias[0];
            return $response->serialize();
        }

    }
    
?>