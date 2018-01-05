<?php
    class Perfil {
        private $id = null;
        private $nome = null;
        private $senha = null;
        private $email = null;
        private $telefone = null;
        private $foto = null;
        private $criado_em = null;
        private $atualizado_em = null;
        private $ultimo_acesso = null;
        private $permissao = null; //Pode ser 'Administrador','Gerente','Corretor','Marketing'
        
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

        public function setCriadoEm($criado_em) {
            $this->criado_em = $criado_em;
        }
        
        public function getCriadoEm() {
            return $this->criado_em;
        }

        public function setAtualizadoEm($atualizado_em) {
            $this->atualizado_em = $atualizado_em;
        }
        
        public function getAtualizadoEm() {
            return $this->atualizado_em;
        }

        public function setUltimoAcesso($ultimo_acesso) {
            $this->ultimo_acesso = $ultimo_acesso;
        }
        
        public function getUltimoAcesso() {
            return $this->ultimo_acesso;
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