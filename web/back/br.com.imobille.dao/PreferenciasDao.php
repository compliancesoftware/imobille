<?php
    class PreferenciasDao extends Dao{
        public function __construct() {
            parent::__construct();
        }

        public function getPreferencias() {
            $preferencias = new Preferencias();
            $preferencias = $this->retrieve($preferencias);

            return $preferencias;
        }

        public function createPreferencias($preferencias) {
            return parent::persist($preferencias);
        }

        public function updatePreferencias($preferencias) {
            return parent::update($preferencias);
        }
    }
?>