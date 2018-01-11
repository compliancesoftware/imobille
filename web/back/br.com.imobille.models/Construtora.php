<?php
    class Construtora {
        private $id = 0;
        private $nome = '';
        private $logo = '';
        private $responsavel = '';
        private $contato = '';
        private $email = '';
        private $endereco = null;
        private $criadoEm = '';
        private $criadoPor = null;
        private $atualizadoEm = '';
		private $atualizadoPor = null;

		public function getId() {
			return $this->id;
		}
		public function setId($id) {
			$this->id = $id;
		}
		public function getNome() {
			return $this->nome;
		}
		public function setNome($nome) {
			$this->nome = $nome;
		}
		public function getLogo() {
			return $this->logo;
		}
		public function setLogo($logo) {
			$this->logo = $logo;
		}
		public function getResponsavel() {
			return $this->responsavel;
		}
		public function setResponsavel($responsavel) {
			$this->responsavel = $responsavel;
		}
		public function getContato() {
			return $this->contato;
		}
		public function setContato($contato) {
			$this->contato = $contato;
		}
		public function getEmail() {
			return $this->email;
		}
		public function setEmail($email) {
			$this->email = $email;
		}
		public function getEndereco() {
			return $this->endereco;
		}
		public function setEndereco($endereco) {
			$this->endereco = $endereco;
		}
		public function getCriadoEm() {
			return $this->criadoEm;
		}
		public function setCriadoEm($criadoEm) {
			$this->criadoEm = $criadoEm;
		}
		public function getCriadoPor() {
			return $this->criadoPor;
		}
		public function setCriadoPor($criadoPor) {
			$this->criadoPor = $criadoPor;
		}
		public function getAtualizadoEm() {
			return $this->atualizadoEm;
		}
		public function setAtualizadoEm($atualizadoEm) {
			$this->atualizadoEm = $atualizadoEm;
		}
		public function getAtualizadoPor() {
			return $this->atualizadoPor;
		}
		public function setAtualizadoPor($atualizadoPor) {
			$this->atualizadoPor = $atualizadoPor;
		}
        
        public function serialize() {
            $str = json_encode($this->read());
            $str = preg_replace_callback('/\\\\u([0-9a-fA-F]{4})/', function ($match) {
                return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');
			}, $str);
			$str = str_replace('"endereco":{}','"endereco":'.$this->endereco->serialize(),$str);
            return $str;
        }

        public function read() {
            return get_object_vars($this);
        }

        public function entityName() {
            return 'construcao';
        }
    }
?>
