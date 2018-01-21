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
            $response = $this->preferenciasDao->updatePreferencias($preferencias);
            return $response->serialize();
        }

        public function getPreferencias() {
            $preferencias = $this->preferenciasDao->getPreferencias();
            $response = $preferencias[0];
            return $response->serialize();
        }

    }
    
?>