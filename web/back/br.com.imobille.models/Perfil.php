<?php
    class Perfil {
        private $id = null;
        private $nome = null;
        private $senha = null;
        private $email = null;
        private $telefone = null;
        private $foto = null;
        private $criadoEm = null;
        private $atualizadoEm = null;
        private $ultimoAcesso = null;
        private $permissao = null; //Pode ser 'Administrador','Gerente','Corretor','Marketing','Cliente','Desativado'
        
        public function setId($id) {
            $this->id = $id;
        }
        
        public function getId() {
            return $this->id;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }
        
        public function getNome() {
            return $this->nome;
        }

        public function setSenha($senha) {
            $this->senha = $senha;
        }
        
        public function getSenha() {
            return $this->senha;
        }

        public function setEmail($email) {
            $this->email = $email;
        }
        
        public function getEmail() {
            return $this->email;
        }

        public function setTelefone($telefone) {
            $this->telefone = $telefone;
        }
        
        public function getTelefone() {
            return $this->telefone;
        }

        public function setFoto($foto) {
            $this->foto = $foto;
        }
        
        public function getFoto() {
            return $this->foto;
        }

        public function setCriadoEm($criadoEm) {
            $this->criadoEm = $criadoEm;
        }
        
        public function getCriadoEm() {
            return $this->criadoEm;
        }

        public function setAtualizadoEm($atualizadoEm) {
            $this->atualizadoEm = $atualizadoEm;
        }
        
        public function getAtualizadoEm() {
            return $this->atualizadoEm;
        }

        public function setUltimoAcesso($ultimoAcesso) {
            $this->ultimoAcesso = $ultimoAcesso;
        }
        
        public function getUltimoAcesso() {
            return $this->ultimoAcesso;
        }

        public function setPermissao($permissao) {
            $this->permissao = $permissao;
        }
        
        public function getPermissao() {
            return $this->permissao;
        }

        public function serialize() {
            $str = json_encode($this->read());
            $str = preg_replace_callback('/\\\\u([0-9a-fA-F]{4})/', function ($match) {
                return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');
            }, $str);
            return $str;
        }

        public function read() {
            return get_object_vars($this);
        }

        public function entityName() {
            return 'perfil';
        }
    }
?>